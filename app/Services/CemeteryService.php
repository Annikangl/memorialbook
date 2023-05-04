<?php


namespace App\Services;


use App\DTOs\Cemetery\CemeteryDTO;
use App\Models\Cemetery\Cemetery;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CemeteryService
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function create(CemeteryDTO $cemeteryDTO, int $userId, bool $isDraft = false): Cemetery
    {
        $cemetery = Cemetery::query()->make([
            'title' => $cemeteryDTO->title,
            'title_en' => $cemeteryDTO->titleEn,
            'subtitle' => $cemeteryDTO->subtitle,
            'email' => $cemeteryDTO->email,
            'phone' => $cemeteryDTO->phone,
            'schedule' => $cemeteryDTO->schedule,
            'address' => $cemeteryDTO->address,
            'latitude' => $cemeteryDTO->addressCoords['lat'] ?? null,
            'longitude' => $cemeteryDTO->addressCoords['lng'] ?? null,
            'description' => $cemeteryDTO->description,
            'status' => $isDraft ? Cemetery::STATUS_DRAFT : Cemetery::STATUS_ACTIVE,
            'access' => $cemeteryDTO->access
        ]);

        $cemetery->user()->associate($userId);
        $cemetery->save();

        if ($avatar = $cemeteryDTO->avatar) {
            $cemetery->addMedia($avatar)->toMediaCollection('avatars');
        }

        if ($banner = $cemeteryDTO->banner) {
            $cemetery->addMedia($banner)->toMediaCollection('banners');
        }

        if ($gallery = $cemeteryDTO->gallery) {
            foreach ($gallery as $image) {
                $cemetery->addMedia($image)->toMediaCollection('gallery');
            }
        }

        return $cemetery;
    }
}
