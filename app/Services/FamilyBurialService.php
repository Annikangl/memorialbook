<?php


namespace App\Services;


use App\Models\Profile\FamilyBurial;
use App\Models\Profile\Human\Human;
use Illuminate\Support\Collection;

class FamilyBurialService
{
    public function create(Collection $humans): FamilyBurial
    {
        $burial = FamilyBurial::create(['banner' => FamilyBurial::DEFAULT_BANNER]);

        $humans->each(function ($human) use ($burial) {
            /** @var Human $human */
            $human->familyBurial()->associate($burial);
            $human->save();
        });

        return $burial;
    }
}
