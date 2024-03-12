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
use MoonShine\Components\Badge;
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
                                Text::make('Отчество','middle_name')->hideOnIndex(),
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
                                Text::make('Координата, ш.', 'lat')
                                    ->hideOnIndex()
                                    ->changeFill(
                                        fn(Human $data, Field $field) => isset($data['burial_coords']['lat'])
                                            ? $data['burial_coords']['lat'] : null
                                    )
                                    ->required()
                            ])->columnSpan(6),
                            Column::make([
                                Text::make('Координата, д.','lng')
                                    ->hideOnIndex()
                                    ->changeFill(
                                        fn(Human $data, Field $field) => isset($data['burial_coords']['lng'])
                                            ? $data['burial_coords']['lng'] : null
                                    )
                                    ->required(),
                            ])->columnSpan(6),
                        ]),
                        Grid::make([
                            Column::make([
                                Select::make('Мать','mother_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('full_name', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->searchable()
                                    ->hideOnIndex(),
                            ])->columnSpan(4),
                            Column::make([
                                Select::make('Отец','father_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('full_name', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->searchable()
                                    ->hideOnIndex(),
                            ])->columnSpan(4),
                            Column::make([
                                Select::make('Супруг','spouse_id')
                                    ->options(Human::query()
                                        ->select(['id','first_name','last_name'])
                                        ->get()
                                        ->pluck('full_name', 'id')
                                        ->toArray())
                                    ->nullable()
                                    ->searchable()
                                    ->hideOnIndex(),
                            ])->columnSpan(4),
                        ]),
                    ]),
                    Tab::make('Описание',[
                        Image::make('Изображения и видео','gallery')
                            ->removable()
                            ->multiple()
                            ->required()
                            ->hideOnIndex()
                            ->changeFill(
                                fn(Human $data, Field $field) => $data->getCustomGallery()
                            )
                            ->allowedExtensions(['jpg', 'png', 'jpeg','webp', 'mp4']),

                        Image::make('Аватар', 'avatar')
                            ->allowedExtensions(['jpg', 'png', 'jpeg','webp'])
                            ->changeFill(
                                fn(Human $data, Field $field) => $data->getCustomAvatar()
                            ),

                        File::make('Сертификат о смерти', 'death_certificate')
                            ->allowedExtensions(['doc', 'docs', 'pdf'])
                            ->changeFill(
                                fn(Human $data, Field $field) => $data->getCustomDocument()
                            )
                            ->hideOnIndex(),

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
                                '1'=>'Черновик',
                                '0'=>'Активный',
                            ])
                            ->optionProperties(fn() => [
                                1 => ['image' => '/image/DocumentMinus.svg'],
                                0 => ['image' => '/image/DocumentCheck.svg'],
                            ])
                            ->hideOnIndex()
                            ->required(),
                        BelongsTo::make('Cоздатель записи','users',
                            fn($user)=> $user->username, resource: new UserResource())
                            ->hideOnIndex()
                            ->searchable()
                            ->required(),
                        Select::make('Доступ публикации', 'access')
                            ->options([
                                Profile::ACCESS_PUBLIC=>'Публичный',
                                Profile::ACCESS_AVAILABLE=>'Доступный',
                                Profile::ACCESS_PRIVATE=>'Приватный',
                            ])
                            ->hideOnIndex()
                            ->badge(fn($status, Field $field) => $status === Profile::ACCESS_PUBLIC ? 'blue' : 'red')
                            ->required(),
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

        $item['burial_coords']=['lat'=>$item['lat'],'lng'=>$item['lng']];

        $updatedData = collect($item['gallery'])->map(function($image) {
            $filePath = Storage::path($image);
            $image = new UploadedFile($filePath, $image, 'image/jpg/png/jpeg/mp4', 1024);
            return $image;
        })->all();
        $item['gallery'] = $updatedData;

        if ($item['death_certificate']!==null){
            $filePath = Storage::path($item['death_certificate']);
            $file = new UploadedFile($filePath, $item['death_certificate'], 'application/pdf', 0,false);
            $item['death_certificate'] = $file;
        }
        if ($item['avatar']!==null){
            $filePath = Storage::path($item['avatar']);
            $avatar = new UploadedFile($filePath, $item['avatar'], 'image/jpg/png/jpeg', 0,false);
            $item['avatar'] = $avatar;
        }

        $item['user_id']=(int)$item['user_id'];
        $humanDto = HumanDTO::fromArray($item->toArray());
        $human = $this->humanService->create(
            humanDTO: $humanDto,
            userId: $item['user_id'],
        );
        return $human;
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
