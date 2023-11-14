<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CommunityFilter extends ModelFilter
{
    public $relations = [];

    public function title(string $title): CommunityFilter
    {
        return $this->whereLike('title', $title);
    }
}
