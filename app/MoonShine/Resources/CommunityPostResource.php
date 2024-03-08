<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Community\Posts\Post;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class CommunityPostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Посты сообщества';

    public function getActiveActions(): array
    {
        return ['view'];
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Текст','postable_type'),
                Text::make('Тип создания','content_type'),
                Date::make('Дата создания', 'created_at')
                    ->format('Y-m-d')
                    ->hideOnCreate(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
