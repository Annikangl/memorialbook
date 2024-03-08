<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\DTOs\Cemetery\CemeteryDTO;
use App\Models\Profile\Cemetery\Cemetery;
use App\Services\CemeteryService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\PageType;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\Fields;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class CemeteryResource extends ModelResource
{
    protected string $model = Cemetery::class;

    protected string $title = 'Кладбища';

    private CemeteryService $cemeteryService;

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    public function __construct()
    {
        $this->cemeteryService = app(CemeteryService::class);
    }

    public function getActiveActions(): array
    {
        return ['create', 'view', 'delete'];
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
                              Text::make('Название кладбища','title')
                                  ->required(),
                          ])->columnSpan(6),
                          Column::make([
                              Text::make('Подзаголовок','subtitle')
                                  ->hideOnIndex(),
                          ])->columnSpan(6)
                      ]),
                      Text::make('Адрес калдбища','address')
                          ->required(),
                      Grid::make([
                          Column::make([
                              Number::make('Координата, ш.', 'lat')
                                  ->hideOnIndex()
                                  ->changeFill(
                                      fn(Cemetery $data, Field $field) => isset($data['address_coords']['lat'])
                                          ? $data['address_coords']['lat'] : null
                                  )
                          ])->columnSpan(6),
                          Column::make([
                              Number::make('Координата, д.','lng')
                                  ->hideOnIndex()
                                  ->changeFill(
                                      fn(Cemetery $data, Field $field) => isset($data['address_coords']['lng'])
                                          ? $data['address_coords']['lng'] : null
                                  )
                          ])->columnSpan(6),
                      ]),
                      Grid::make([
                          Column::make([
                              Email::make('Email','email')
                                  ->hideOnIndex(),
                          ])->columnSpan(4),
                          Column::make([
                              Phone::make('Телефон','phone')
                                  ->hideOnIndex(),
                          ])->columnSpan(4),
                          Column::make([
                              Text::make('Расписание','schedule')
                                  ->hideOnIndex()
                          ])->columnSpan(4)
                      ]),
                      BelongsTo::make('Cоздатель записи','user',
                          fn($user)=> $user->id.' | '.$user->username, resource: new UserResource())
                          ->hideOnIndex()
                          ->required(),
                  ]),
                    Tab::make('Дополнительная информация',[
                        Grid::make([
                            Column::make([
                                File::make('Подтверждающие документы','confirming_documents')
                                    ->hideOnIndex()
                                    ->multiple()
                                    ->changeFill(
                                        fn(Cemetery $data, Field $field) => $data->getCustomDocuments()
                                    )
                                    ->allowedExtensions(['doc', 'docs', 'pdf']),
                            ])->columnSpan(6),
                            Column::make([
                                Image::make('Галерея','gallery')
                                    ->multiple()
                                    ->hideOnIndex()
                                    ->changeFill(
                                        fn(Cemetery $data, Field $field) => $data->getCustomGallery()
                                    )
                                    ->allowedExtensions(['jpg', 'png', 'jpeg','webp', 'mp4']),
                            ])->columnSpan(6),
                        ]),
                        Textarea::make('Описание','description')
                            ->hideOnIndex(),
                    ]),

                    Tab::make('Доступ',[
                        Select::make('Доступ публикации', 'access')
                            ->options([
                                Cemetery::ACCESS_PUBLIC=>'Публичный',
                                Cemetery::ACCESS_PRIVATE=>'Приватный',
                            ])
                            ->required()
                            ->hideOnIndex(),
                    ])
                ]),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
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

        $item['address_coords']=['lat'=>$item['lat'],'lng'=>$item['lng']];
        $updatedData = collect($item['gallery'])->map(function($image) {
            $filePath = Storage::path($image);
            $image = new UploadedFile($filePath, $image, 'image/jpg/png/jpeg/mp4', 1024);
            return $image;
        })->all();
        $updatedDocument= collect($item['confirming_documents'])->map(function($document) {
            $filePath = Storage::path($document);
            $document = new UploadedFile($filePath, $document, 'doc/docs/pdf', 1024);
            return $document;
        })->all();
        $item['gallery'] = $updatedData;
        $item['confirming_documents'] = $updatedDocument;

        $cementeryDTO = CemeteryDTO::fromArray($item->toArray());
        $cementery = $this->cemeteryService->create(
            cemeteryDTO: $cementeryDTO,
            userId: $item['user']['id'],
        );

        return $cementery;
    }
}
