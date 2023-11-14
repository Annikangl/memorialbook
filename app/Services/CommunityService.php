<?php


namespace App\Services;

use App\DTOs\Community\CommunityDTO;
use App\Exceptions\Api\Community\CommunityException;
use App\Models\Community\Community;
use Illuminate\Pagination\LengthAwarePaginator;

class CommunityService
{
    /**
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
            throw new CommunityException($exception->getMessage(), 500);
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
}
