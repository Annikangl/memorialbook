<?php


namespace App\Services;


use App\Models\Profile\Burial;
use App\Models\Profile\Human\Human;
use Illuminate\Support\Collection;

class BurialService
{
    public function create(Collection $humans): Burial
    {
        $burial = Burial::create(['banner' => Burial::DEFAULT_BANNER]);

        $humans->each(function ($human) use ($burial) {
            /** @var Human $human */
            $human->familyBurial()->associate($burial);
            $human->save();
        });

        return $burial;
    }
}
