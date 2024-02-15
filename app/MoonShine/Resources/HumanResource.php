<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Profile\Human\Human;
use Illuminate\Database\Eloquent\Model;


use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class HumanResource extends ModelResource
{
    protected string $model = Human::class;

    protected string $title = 'Люди';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
