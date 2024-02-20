<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\DTOs\Profile\HumanDTO;
use App\Models\Profile\Hobby;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Profile;
use App\Services\HumanService;
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
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class HumanResource extends ModelResource
{
    protected string $model = Human::class;

    protected string $title = 'Люди';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    private HumanService $humanService;

    public function __construct()
    {
        $this->humanService = app(HumanService::class);
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
                        Grid::make([
                            Column::make([
                                Text::make('Имя','first_name')->required(),
                            ])->columnSpan(4),
                            Column::make([
                                Text::make('Фамилия','last_name')->required(),
                            ])->columnSpan(4),
                            Column::make([
                                Text::make('Отчество','middle_name')->required(),
                            ])->columnSpan(4),
                        ]),
                        Grid::make([
                            Column::make([
                                Select::make('Пол','gender')
                                    ->hideOnIndex()
                                    ->options([
                                        Human::MALE=>'Мужчина',
                                        Human::FEMALE=>'Женщина',
                                    ])->required(),
                            ])->columnSpan(4),
                            Column::make([
                                Date::make('Дата рождения','date_birth')
                                    ->changeFill(fn($data) => $data->getOriginal('date_birth'))
                                    ->required()
                                    ->format('Y'),
                            ])->columnSpan(4),
                            Column::make([
                                Date::make('Дата смерти','date_death')
                                    ->changeFill(fn($data) => $data->getOriginal('date_death'))
                                    ->required()
                                    ->format('Y'),

                            ])->columnSpan(4),
                        ]),
                        Text::make('Причина смерти','death_reason')
                            ->hideOnIndex()
                            ->required(),
                        Grid::make([
                            Column::make([
                                Text::make('Место рождения','birth_place')
                                    ->hideOnIndex()
                                    ->required(),
                            ])->columnSpan(6),
                            Column::make([
                                Text::make('Место захоронения','burial_place')
                                    ->hideOnIndex(),
                            ])->columnSpan(6),
                        ]),
                        Grid::make([
                            Column::make([
                                Number::make('Координата, ш.', 'lat')
                                    ->hideOnIndex()
                                    ->changeFill(
                                        fn(Human $data, Field $field) => isset($data['burial_coords']['lat'])
                                            ? $data['burial_coords']['lat'] : null
                                    )
                                    ->required()
                            ])->columnSpan(6),
                            Column::make([
                                Number::make('Координата, д.','lng')
                                    ->hideOnIndex()
                                    ->changeFill(
                                        fn(Human $data, Field $field) => isset($data['burial_coords']['lng'])
                                            ? $data['burial_coords']['lng'] : null
                                    )
                                    ->required(),
                            ])->columnSpan(6),
                        ]),
//                        File::make('Сертификат о смерти', 'death_certificate')
//                            ->allowedExtensions(['doc', 'docs', 'pdf'])
//                            ->hideOnIndex(),
                        Grid::make([
                            Column::make([
                                Select::make('Мать','mother_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('name_full', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->hideOnIndex(),
                            ])->columnSpan(3),
                            Column::make([
                                Select::make('Отец','father_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('name_full', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->hideOnIndex(),
                            ])->columnSpan(3),
                            Column::make([
                                Select::make('Супруг','spouse_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('name_full', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->hideOnIndex(),
                            ])->columnSpan(3),
                            Column::make([
                                Select::make('Ребенок','children_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('name_full', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->hideOnIndex(),
                            ])->columnSpan(3),
                        ]),
                        BelongsTo::make('Cоздатель','user',
                            fn($user)=> $user->id.' | '.$user->username, resource: new UserResource())
                            ->hideOnIndex()
                            ->required(),
                    ]),
                    Tab::make('Описание',[
                        Image::make('Изображения и видео','gallery')
                            ->removable()
                            ->multiple()
                            ->nullable()
                            ->required()
                            ->hideOnIndex()
                            ->changeFill(
                                fn(Human $data, Field $field) => $data->getCustomGallery()
                            )
                            ->allowedExtensions(['jpg', 'png', 'jpeg','webp', 'mp4']),
                        Textarea::make('Описание','description')
                            ->hideOnIndex(),

                        Select::make('Хобби','hobbies')
                            ->options(Hobby::query()->pluck('title', 'id')->toArray())
                            ->hideOnIndex()
                            ->multiple()
                    ]),
                    Tab::make('Завершение',[
                        Select::make('Настройка публикации', 'as_draft')
                            ->options([
                                '0'=>'Черновик',
                                '1'=>'Активный',
                            ])
                            ->hideOnIndex()
                            ->required(),
                        Select::make('Доступ публикации', 'access')
                            ->options([
                                Profile::ACCESS_PUBLIC=>'Публичный',
                                Profile::ACCESS_AVAILABLE=>'Доступный',
                                Profile::ACCESS_PRIVATE=>'Приватный',
                            ])
                            ->hideOnIndex()
                            ->required(),
                    ]),
                ]),
            ]),
        ];
    }

    public function save(Model $item, ?Fields $fields = null): Model
    {

// TODO: на Update

//        if ($item['id'] !== null) {
//            $item['as_draft']=true;
//            $humanDto = HumanDTO::fromArray($item->toArray());
//            dd($humanDto);
//            $human = $this->humanService->update(
//                id:$item['id'],
//                humanDTO: $humanDto,
//                user: $item['user'],
//                isDraft: $item['as_draft'],
//            );
//            return $human;
//        }

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

        $item['burial_coords']=['lat'=>$item['lat'],'lng'=>$item['lng']];

        $updatedData = collect($item['gallery'])->map(function($image) {

            $filePath = Storage::path($image);
            $image = new UploadedFile($filePath, $image, 'image/jpg/png/jpeg,mp4', 1024);

            return $image;
        })->all();

        $item['gallery'] = $updatedData;

// TODO:  Проверить тип загрузки файла Сертификата смерти

//        $filePath = Storage::path($item['death_certificate']);
//        $file = new UploadedFile($filePath, $item['death_certificate'], 'application/pdf', 0,false);
//        $item['death_certificate'] = $file;
//        dd($item->toArray());

        $humanDto = HumanDTO::fromArray($item->toArray());
        $human = $this->humanService->create(
            humanDTO: $humanDto,
            userId: $item['user']['id'],
        );
        return $human;
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
