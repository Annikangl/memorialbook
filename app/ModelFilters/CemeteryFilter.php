<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CemeteryFilter extends ModelFilter
{
    public $relations = [];

    public function title(string $title): CemeteryFilter
    {
        return $this->whereLike('title', $title);
    }
}
