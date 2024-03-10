<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\DTOs\Community\CommunityDTO;
use App\DTOs\Profile\PetDTO;
use App\Models\Community\Community;
use App\Models\Profile\Pet\Pet;
use App\Services\CommunityService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\PageType;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\Fields;
use MoonShine\Fields\Image;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class CommunityResource extends ModelResource
{
    protected string $model = Community::class;

    protected string $title = 'Сообщества';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    private CommunityService $communityService;

    public function __construct()
    {
        $this->communityService = app(CommunityService::class);
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
                                Text::make('Название сообщества','title')
                                    ->required(),
                            ])->columnSpan(6),
                            Column::make([
                                Text::make('Подзаголовок','subtitle')
                                    ->hideOnIndex()
                                    ->required(),
                            ])->columnSpan(6),
                        ]),
                        Grid::make([
                            Column::make([
                                Email::make('Email','email')
                                    ->hideOnIndex()
                                    ->required(),
                            ])->columnSpan(6),
                            Column::make([
                                Phone::make('Телефон','phone')
                                    ->hideOnIndex()
                                    ->required()
                            ])->columnSpan(6),
                        ]),
                        Grid::make([
                            Column::make([
                                Text::make('Адрес','address')
                                    ->hideOnIndex()
                                    ->required(),
                            ])->columnSpan(6),
                            Column::make([
                                Url::make('Веб-сайт','website')
                                    ->hideOnIndex()
                            ])->columnSpan(6),
                        ]),
                        Text::make('Ссылки на соц сети','social_links')
                            ->hideOnIndex()
                            ->changeFill(
                                fn(Community $data, Field $field): string => ($data['social_links'] !== null) ?
                                    implode(" ", $data['social_links']) : '')
                            ->hint('Писать через пробел'),

                        Textarea::make('Описание','description')
                                ->hideOnIndex()
                                ->required(),
                    ]),
                    Tab::make('Дополнительная информация',[
                        Image::make('Аватар', 'avatar')
                            ->allowedExtensions(['jpg', 'png', 'jpeg','webp'])
                            ->hideOnUpdate()
                            ->changeFill(
                                fn(Community $data, Field $field) => $data->getCustomAvatar()
                            ),

                        Image::make('Изображения и видео','gallery')
                            ->removable()
                            ->multiple()
                            ->changeFill(
                                fn(Community $data, Field $field) => $data->getCustomPictures()
                            )
                            ->hideOnIndex()
                            ->hideOnUpdate()
                            ->allowedExtensions(
                                ['jpg', 'png', 'jpeg','mp4']
                            ),
                        BelongsTo::make('Автор сообщества','owner',
                            fn($user)=> $user->username, resource: new UserResource())
                            ->hideOnIndex()
                            ->required(),
                        Text::make(trans('Кол-во подписчиков'))
                            ->changeFill(fn(Community $community, Field $field)=>$community->users()->count())
                            ->hideOnForm(),
                        Text::make(trans('Кол-во постов'))
                            ->changeFill(fn(Community $community, Field $field)=>$community->posts()->count())
                            ->hideOnForm(),
                        HasMany::make(trans('Посты сообщества'),'posts', resource: new CommunityPostResource())
                            ->async()
                            ->hideOnIndex(),

                        Date::make('Дата создания', 'created_at')
                            ->format('Y-m-d')
                            ->hideOnForm(),
                    ])
                ])

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
        $item['social_links'] = ($item['social_links'] !== null) ? explode(" ", $item['social_links']) : null;

        if ($item['id']!== null){
            $communityDTO = CommunityDTO::fromArray($item->toArray());
            $communityUpdate = $this->communityService->update(
                userId: $item['owner']['id'],
                community: $item,
                communityDTO: $communityDTO,
            );
            return $communityUpdate;
        }

        if ($item['avatar']!==null){
            $filePath = Storage::path($item['avatar']);
            $avatar = new UploadedFile($filePath, $item['avatar'], 'image/jpg/png/jpeg', 0,false);
            $item['avatar'] = $avatar;
        }
        $updatedData = collect($item['gallery'])->map(function($image) {
            $fileUrl = Storage::path($image);
            $image = new UploadedFile($fileUrl, $image, 'image/jpg/png/jpeg,mp4', 1024);
            return $image;
        })->all();
        $item['gallery'] = $updatedData;

        $communityDTO = CommunityDTO::fromArray($item->toArray());
        $community = $this->communityService->create(
            userId: $item['owner']['id'],
            communityDTO: $communityDTO,
        );
        return $community;
    }

    public function filters(): array
    {
        return [
            Text::make('Название сообщества', 'title'),
            BelongsTo::make('Автор сообщества','owner',
                fn($user)=> $user->id.' | '.$user->username, resource: new UserResource())
                ->searchable()
                ->nullable(),
            Date::make('Дата создания', 'created_at')->format('Y-m-d'),
        ];

    }

    public function rules(Model $item): array
    {
        return [];
    }
}
