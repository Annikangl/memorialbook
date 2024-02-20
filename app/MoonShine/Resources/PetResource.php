<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\DTOs\Profile\PetDTO;
use App\Models\Profile\Pet\Pet;
use App\Services\PetService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\PageType;
use MoonShine\Fields\Date;
use MoonShine\Fields\Field;
use MoonShine\Fields\Fields;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class PetResource extends ModelResource
{
    protected string $model = Pet::class;

    protected string $title = 'Животные';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    private PetService $petService;

    public function __construct()
    {
        $this->petService = app(PetService::class);
    }

    public function getActiveActions(): array
    {
        return ['create','view', 'delete'];
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
                        Text::make('Причина смерти','death_reason')
                            ->hideOnIndex()
                            ->required(),
                        Text::make('Место рождения','birth_place')
                            ->required()
                            ->hideOnIndex(),
                        Text::make('Место захоронения','burial_place')
                            ->required()
                            ->hideOnIndex(),
                        Grid::make([
                            Column::make([
                                BelongsTo::make('Владелец','owner',
                                    fn($owner)=> $owner->id.' | '.$owner->first_name.' '.$owner->last_name,
                                    resource: new HumanResource())
                                    ->required(),
                            ])->columnSpan(6),
                            Column::make([
                                BelongsTo::make('Cоздатель','user',
                                    fn($user)=> $user->id.' | '.$user->username, resource: new UserResource())
                                    ->required(),
                            ])->columnSpan(6),
                        ]),
                    ]),
                    Tab::make('Фото и видео',[
                        Image::make('Изображения и видео','gallery')
                            ->removable()
                            ->multiple()
                            ->changeFill(
                                fn(Pet $data, Field $field) => $data->getCustomGallery()
                            )
                            ->hideOnIndex()
                            ->allowedExtensions(
                                ['jpg', 'png', 'jpeg','mp4']
                            ),
                        Textarea::make('Описание животного','description')
                            ->hideOnIndex(),
                    ]),
                    Tab::make(' Настройки публикации ',[
                        Select::make('Настройка публикации', 'as_draft')
                            ->options([
                                '1'=>'Черновик',
                                '0'=>'Активный',
                            ])
                            ->hideOnIndex()
                            ->required(),
                        Date::make('Дата создания','created_at')
                            ->hideOnCreate()
                            ->format('Y-m-d'),
                    ]),
                ]),
            ]),
        ];
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
            $image = new UploadedFile($fileUrl, $image, 'image/jpg/png/jpeg,mp4', 1024);

            return $image;
        })->all();

        $item['gallery'] = $updatedData;
        $item['owner_id']=(int)$item['owner_id'];

        $petDto = PetDTO::fromArray($item->toArray());
        $pet = $this->petService->create(
            petDTO: $petDto,
            userId: $item['user']['id'],
            as_draft: $petDto->as_draft
        );

        return $pet;
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
