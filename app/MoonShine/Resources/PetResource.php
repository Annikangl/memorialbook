<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\DTOs\Profile\PetDTO;
use App\Models\Profile\Pet\Pet;
use App\Services\PetService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\Field;
use MoonShine\Fields\Fields;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class PetResource extends ModelResource
{
    protected string $model = Pet::class;

    protected string $title = 'Животные';

    private PetService $petService;
    public function __construct()
    {
        $this->petService = app(PetService::class);
    }
    public function getActiveActions(): array
    {
        return ['create','view', 'delete',];

    }
    public function save(Model $item, ?Fields $fields = null): Model
    {
        $fields ??= $this->getFormFields()->onlyFields();

        $fields->fill($item->toArray(), $item);

        $fields->each(fn (Field $field): mixed => $field->beforeApply($item));
            if (! $item->exists) {
                $item = $this->beforeCreating($item);
            }
            if ($item->exists) {
                $item = $this->beforeUpdating($item);
            }
            $fields->withoutOutside()
                ->each(fn (Field $field): mixed => $field->apply($this->onSave($field), $item));

        $updatedData = collect($item['gallery'])->map(function($image) {

            $fileUrl = Storage::path($image);
            $image = new UploadedFile($fileUrl, $image, 'image/jpg/png/jpeg', 1024);

            return $image;
        })->all();

        $item['gallery'] = $updatedData;
        $item['owner_id']=(int)$item['owner_id'];

        $petDto = PetDTO::fromArray($item->toArray());
        $pet = $this->petService->create(
            petDTO: $petDto,
            userId: auth()->id(),
            as_draft: $petDto->as_draft
        );

        return $pet;
    }
    public function redirectAfterSave(): string
    {
        return '/admin/resource/pet-resource/index-page';
    }
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Tabs::make([
                    Tab::make('Основная информация',[
                        Text::make('Имя питомца','name')->required(),
                        Text::make('Порода','breed')->required(),
                        Grid::make([
                            Column::make([
                            Date::make('Дата рождения','date_birth')
                                ->changeFill(fn($data) => $data->getOriginal('date_birth'))
                                ->required()
                                ->format('Y-m-d'),
                            ])->columnSpan(6),
                            Column::make([
                            Date::make('Дата смерти','date_death')
                                    ->changeFill(fn($data) => $data->getOriginal('date_death'))
                                    ->required()
                                    ->format('Y-m-d'),

                            ])->columnSpan(6),
                        ]),
                        Text::make('Причина смерти','death_reason')->required(),
                        Text::make('Место рождения','birth_place')->required(),
                        Text::make('Место захоронения','burial_place')->required(),
                        Grid::make([
                            Column::make([
                                BelongsTo::make('Владелец','owner', resource: new HumanResource())
                                    ->required()
                                    ->hideOnIndex(),
                            ])->columnSpan(6),
                            Column::make([
                                 BelongsTo::make('Пользователь','user', resource: new UserResource())
                                    ->required()
                                    ->hideOnIndex(),
                            ])->columnSpan(6),
                        ]),
                    ]),
                    Tab::make('Описание',[
                        Image::make('Изображения и видео','gallery')
                            ->removable()
                            ->multiple()
                            ->changeFill(
                                fn(Pet $data, Field $field) => $data->getCustomGallery()
                            )
                            ->hideOnIndex()
                            ->allowedExtensions(
                                ['jpg', 'png', 'jpeg']
                            ),
                        Textarea::make('Описание животного','description')
                            ->hideOnIndex(),
                    ]),
                    Tab::make('Завершение',[
                        Select::make('Настройка публикации', 'as_draft')
                            ->options([
                                '1'=>'Черновик',
                                '0'=>'Активный',
                            ])
                            ->hideOnIndex()
                            ->required(),
                    ]),
                ]),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
