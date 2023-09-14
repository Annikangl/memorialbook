<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class HumanFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function fullName($fullName): HumanFilter
    {
        return $this->where(function (Builder $query) use ($fullName) {
            return $query->where('first_name', 'LIKE', "%$fullName%")
                ->orWhere('last_name', 'LIKE', "%$fullName%")
                ->orWhere('middle_name', 'like', "%$fullName%");
        });
    }

    public function birthYear($birthYear): HumanFilter
    {
        [$from, $to] = Str::of($birthYear)->explode('-');

        return $this->whereBetween(\DB::raw('YEAR(date_birth)'), [$from, $to]);
    }

    public function deathYear($deathYear): HumanFilter
    {
        [$from, $to] = Str::of($deathYear)->explode('-');

        return $this->whereBetween(\DB::raw('YEAR(date_death)'), [$from, $to]);
    }

    public function country(string $country): HumanFilter
    {
        return $this->where('birth_place', 'like', "%$country%");
    }

}
