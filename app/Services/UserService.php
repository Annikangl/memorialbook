<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\User\User;
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
        // TODO
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
}
