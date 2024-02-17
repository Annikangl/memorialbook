<?php


namespace App\Services;


use App\DTOs\User\UserDTO;
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
    public function update(User $user, UserDTO $userDTO): User
    {
        if ($userDTO->password) {
            $userDTO->password = bcrypt($userDTO->password);
        }

        $validatedData = collect($userDTO->toArray())->filter()->except(['avatar'])->toArray();

        $user->update($validatedData);

        if ($avatar = $userDTO->avatar) {
            $user->addMedia($avatar)->toMediaCollection('avatars');
        }

        return $user;
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
