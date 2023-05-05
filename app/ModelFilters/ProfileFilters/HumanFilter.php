<?php

namespace App\ModelFilters\ProfileFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class HumanFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function name($name): HumanFilter
    {
        return $this->where(function (Builder $query) use ($name) {
            return $query->where('first_name', 'LIKE', "%$name%")
                ->orWhere('last_name', 'LIKE', "%$name%");
        });
    }

    public function birthYear($birthYear): HumanFilter
    {
        return $this->whereYear('date_birth', $birthYear);
    }

    public function deathYear($deathYear): HumanFilter
    {
        return $this->whereYear('date_death', $deathYear);
    }
}
