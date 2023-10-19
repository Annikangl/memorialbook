<?php

namespace App\Services;

use App\DTOs\Profile\PetDTO;
use App\Exceptions\Api\Profile\PetException;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Profile;

class PetService
{
    /**
     * @throws PetException
     */
    public function create(PetDTO $petDTO, int $userId, bool $as_draft): Pet
    {
        try {
            $pet = Pet::query()->create([
                'user_id' => $userId,
                'owner_id' => $petDTO->owner_id,
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
        } catch (\Throwable $exception) {
            throw new PetException($exception->getMessage(), 500);
        }

        return $pet;
    }
}
