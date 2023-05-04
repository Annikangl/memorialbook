<?php


namespace App\Services;


use App\Models\Profile\Burial;
use App\Models\Profile\Human\Human;
use Illuminate\Support\Collection;

class BurialService
{
    public function create(Collection $humans): Burial
    {
        $burial = Burial::query()->create();

        $humans->each(function ($human) use ($burial) {
            /** @var Human $human */
            $human->burial()->associate($burial);
            $human->save();
        });

        return $burial;
    }
}
