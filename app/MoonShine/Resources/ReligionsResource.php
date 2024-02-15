<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Profile\Human\Religion;
use Illuminate\Database\Eloquent\Model;

use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\FormBuilder;
use MoonShine\Fields\HiddenIds;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class ReligionsResource extends ModelResource
{
    protected string $model = Religion::class;

    protected string $title = 'Религиозные взгляды';
    protected bool $createInModal = true;
    public function getActiveActions(): array
    {
        return ['create','view', 'delete',];

    }
    public function redirectAfterSave(): string
    {
        return '/admin/resource/religions-resource/index-page';
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название','title'),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
