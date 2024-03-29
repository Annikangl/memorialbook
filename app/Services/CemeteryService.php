<?php

namespace App\Services;

use App\DTOs\Cemetery\CemeteryDTO;
use App\Exceptions\Api\Profile\CemeteryException;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\User\User;

class CemeteryService
{
    /**
     * @throws CemeteryException
     */
    public function create(CemeteryDTO $cemeteryDTO, int $userId, bool $isDraft = false): Cemetery
    {
        try {
            $cemetery = Cemetery::query()->create([
                'user_id' => $userId,
                'title' => $cemeteryDTO->title,
                'title_en' => $cemeteryDTO->titleEn,
                'subtitle' => $cemeteryDTO->subtitle,
                'email' => $cemeteryDTO->email,
                'phone' => $cemeteryDTO->phone,
                'schedule' => $cemeteryDTO->schedule,
                'address' => $cemeteryDTO->address,
                'address_coords' => $cemeteryDTO->address_coords,
                'description' => $cemeteryDTO->description,
                'status' => $isDraft ? Cemetery::STATUS_DRAFT : Cemetery::STATUS_ACTIVE,
                'access' => $cemeteryDTO->access
            ]);

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

            if ($confirming_documents = $cemeteryDTO->confirming_documents) {
                foreach ($confirming_documents as $document) {
                    $cemetery->addMedia($document)->toMediaCollection('confirming_documents');
                }
            }

        } catch (\Throwable $exception) {
            throw new CemeteryException($exception->getMessage(), 500);
        }

        return $cemetery;
    }

    /**
     * @throws CemeteryException
     */
    public function subscribe(User $user, Cemetery $cemetery): void
    {
        if ($user->subscribedCemeteries()->exists()) {
            throw new CemeteryException('You already subscribed!', 422);
        }

        $user->subscribedCemeteries()->attach($cemetery->id);
    }

    /**
     * @throws CemeteryException
     */
    public function unsubscribe(User $user, Cemetery $cemetery): void
    {
        if (!$user->subscribedCemeteries()->exists()) {
            throw new CemeteryException('You already unsubscribed!', 422);
        }

        $user->subscribedCemeteries()->detach($cemetery->id);
    }
}
