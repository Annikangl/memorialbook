<?php


namespace App\Services;

use App\DTOs\Community\CommunityDTO;
use App\Exceptions\Api\Community\CommunityException;
use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Profile;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CommunityService
{
    /**
     * Create a new community
     * @param int $userId
     * @param CommunityDTO $communityDTO
     * @return Community
     * @throws CommunityException
     */
    public function create(int $userId, CommunityDTO $communityDTO): Community
    {
        try {
            $community = Community::query()->create([
                'owner_id' => $userId,
                'title' => $communityDTO->title,
                'subtitle' => $communityDTO->subtitle,
                'description' => $communityDTO->description,
                'email' => $communityDTO->email,
                'phone' => $communityDTO->phone,
                'address' => $communityDTO->address,
                'website' => $communityDTO->website,
            ]);

            if ($avatar = $communityDTO->avatar) {
                $community->addMedia($avatar)->toMediaCollection('avatars');
            }

            if ($banner = $communityDTO->banner) {
                $community->addMedia($banner)->toMediaCollection('banners');
            }

            if ($gallery = $communityDTO->gallery) {
                foreach ($gallery as $image) {
                    $community->addMedia($image)->toMediaCollection('gallery');
                }
            }

        } catch (\Throwable $exception) {
            throw new CommunityException($exception->getMessage() . ' empty body', $exception->getCode());
        }

        return $community;
    }

    /**
     * @param int $userId
     * @param Community $community
     * @param CommunityDTO $communityDTO
     * @return Community
     * @throws CommunityException
     */
    public function update(int $userId, Community $community, CommunityDTO $communityDTO): Community
    {
        try {
            $community->update([
                'owner_id' => $userId,
                'title' => $communityDTO->title,
                'subtitle' => $communityDTO->subtitle,
                'description' => $communityDTO->description,
                'email' => $communityDTO->email,
                'phone' => $communityDTO->phone,
                'address' => $communityDTO->address,
                'website' => $communityDTO->website,
            ]);

            if ($avatar = $communityDTO->avatar) {
                $community->clearMediaCollection('avatars');
                $community->addMedia($avatar)->toMediaCollection('avatars');
            }

            if ($banner = $communityDTO->banner) {
                $community->clearMediaCollection('banners');
                $community->addMedia($banner)->toMediaCollection('banners');
            }

            if ($gallery = $communityDTO->gallery) {
                foreach ($gallery as $image) {
                    $community->clearMediaCollection('gallery');
                    $community->addMedia($image)->toMediaCollection('gallery');
                }
            }

            if ($mediaIds = $communityDTO->media_removed_ids) {
                foreach ($mediaIds as $mediaId) {
                    $community->deleteMedia($mediaId);
                }
            }

        } catch (\Throwable $exception) {
            throw new CommunityException($exception->getMessage());
        }

        return $community;
    }

    public function search(array $searchData): LengthAwarePaginator
    {
        return Community::query()
            ->filter($searchData)
            ->paginate(10);
    }

    /**
     * Subscribe user to community
     * @param int $userId
     * @param int $communityId
     * @throws CommunityException
     */
    public function subscribe(int $userId, int $communityId): void
    {
        $community = Community::findOrFail($communityId);

        if ($community->users()->where('id', $userId)->exists()) {
            throw new CommunityException('You already subscribe!', 422);
        }

        $community->users()->attach($userId);
    }

    /**
     * @param int $userId
     * @param int $communityId
     * @throws CommunityException
     */
    public function unsubscribe(int $userId, int $communityId): void
    {
        $community = Community::findOrFail($communityId);

        if (!$community->users()->where('id', $userId)->exists()) {
            throw new CommunityException('You already unsubscribe!', 422);
        }

        $community->users()->detach($userId);
    }

    /**
     * Add memorial to community
     * @param Community $community
     * @param Human|Pet $profile
     * @throws CommunityException
     */
    public function addMemorial(Community $community, Human|Pet $profile): void
    {
        $profileClass = get_class($profile);

        if ($community->communityProfiles()
            ->where('profileable_id', $profile->id)
            ->where('profileable_type', $profileClass)
            ->exists())
        {
            throw new CommunityException('This profile already exists in community', 422);
        }

        $community->communityProfiles()->create([
            'profileable_id' => $profile->id,
            'profileable_type' => $profileClass
        ]);
    }

    /**
     * Remove memorial from community
     * @param Community $community
     * @param Human|Pet $profile
     */
    public function deleteMemorial(Community $community, Human|Pet $profile): void
    {
        $profileClass = get_class($profile);

        $community->communityProfiles()
            ->where('profileable_id', $profile->id)
            ->where('profileable_type', $profileClass)
            ->delete();
    }
}
