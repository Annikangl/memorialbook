<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;


use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Имя','username')->sortable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
