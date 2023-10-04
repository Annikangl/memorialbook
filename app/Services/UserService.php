<?php


namespace App\Services;


use App\Models\Community\Community;
use App\Models\User\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UserService
{
    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(User $user, string $username, ?string $email, ?string $phone, ?UploadedFile $avatar): User
    {
        if ($avatar) {
            $user->addMedia($avatar)->toMediaCollection('avatar');
        }

        return tap($user)->update([
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
        ]);
    }

    public function delete(User|Authenticatable $user): void
    {
        try {
            $user->delete();
            $user->humans()->delete();
            $user->pets()->delete();
        } catch (\Exception) {
            throw new \DomainException('Failed to delete associate data');
        }
    }

    public function subscribeOnCommunity(int $userId, string $communitySlug): void
    {
        /** @var Community $community */
        $community = Community::query()->where('slug', $communitySlug)->firstOrFail();

        if ($community->users()->find($userId)) {
            $this->unsubscribeOnCommunity($userId, $community);
            return;
        }

        $community->users()->attach($userId);
    }

    public function unsubscribeOnCommunity(int $userId, Community $community): void
    {
        $community->users()->detach($userId);
    }
}
