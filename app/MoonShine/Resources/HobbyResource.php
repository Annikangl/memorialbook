<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Profile\Hobby;
use Illuminate\Database\Eloquent\Model;


use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class HobbyResource extends ModelResource
{
    protected string $model = Hobby::class;

    protected string $title = 'Хобби';

    protected bool $createInModal = true;

    public function getActiveActions(): array
    {
        return ['create','view', 'delete',];

    }
    public function redirectAfterSave(): string
    {
        return '/admin/resource/hobby-resource/index-page';
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название','title')->sortable(),

            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
