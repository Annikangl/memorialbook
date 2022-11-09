<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;

class UserService
{
    private $fileUploader;

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
}
