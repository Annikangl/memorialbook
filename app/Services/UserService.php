<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;

class UserService
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function update(User $user, string $username, ?string $email, ?string $phone, ?UploadedFile $avatar): User
    {
        $avatarPath = $user->avatar;

        if ($avatar) {
            $this->fileUploader->remove($avatarPath);
            $avatarPath = $this->fileUploader->upload($avatar, User::AVATAR_PATH);
        }

        return tap($user)->update([
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'avatar' => $avatarPath
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
