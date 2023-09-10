<?php

namespace App\Services;

use App\DTOs\Profile\PetDTO;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Pet\Pet;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class PetService
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function create(PetDTO $petDTO, int $userId, bool $as_draft): Pet
    {
        $pet = Pet::query()->make([
            'name' => $petDTO->name,
            'breed' => $petDTO->breed,
            'date_birth' => $petDTO->date_birth,
            'date_death' => $petDTO->date_death,
            'birth_place' => $petDTO->birth_place,
            'burial_place' => $petDTO->burial_place,
            'death_reason' => $petDTO->death_reason,
            'description' => $petDTO->description,
            'status' => $as_draft ? Profile::STATUS_DRAFT : Profile::STATUS_ACTIVE
        ]);

        $pet->user()->associate($userId);
        $pet->owner()->associate($petDTO->owner_id);

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
