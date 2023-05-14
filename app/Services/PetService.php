<?php

namespace App\Services;

use App\DTOs\Profile\PetDTO;
use App\Models\Profile\Pet\Pet;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class PetService
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function create(PetDTO $petDTO, int $userId): Pet
    {
        $pet = Pet::query()->make([
            'name' => $petDTO->name,
            'breed' => $petDTO->breed,
            'date_birth' => $petDTO->dateBirth,
            'date_death' => $petDTO->dateDeath,
            'birth_place' => $petDTO->birthPlace,
            'burial_place' => $petDTO->burialPlace,
            'death_reason' => $petDTO->deathReason,
            'description' => $petDTO->description,
        ]);

        $pet->user()->associate($userId);

        $pet->save();

        if ($avatar = $petDTO->avatar) {
            $pet->addMedia($avatar)->toMediaCollection('avatars');
        }

        if ($banner = $petDTO->banner) {
            $pet->addMedia($banner)->toMediaCollection('banner');
        }

        if ($gallery = $petDTO->gallery) {
            foreach ($gallery as $image) {
                $pet->addMedia($image)->toMediaCollection('gallery');
            }
        }

        return $pet;
    }
}
