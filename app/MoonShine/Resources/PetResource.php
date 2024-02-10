<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Profile\Pet\Pet;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class PetResource extends ModelResource
{
    protected string $model = Pet::class;

    protected string $title = 'Животные';

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
