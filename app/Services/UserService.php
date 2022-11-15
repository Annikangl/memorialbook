<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Community\Community;
use App\Models\Profile\Profile;
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
        if (!$user->delete()) {
            throw new \DomainException('Ошибка удаления аккаунта');
        }

        $user->profiles()->update(['status' => Profile::STATUS_DRAFT]);
        \Auth::logout();
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
