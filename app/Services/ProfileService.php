<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Models\Profile\Profile;

class ProfileService
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function create(int $userId, ProfileCreateRequest $request)
    {
        $avatarPath = null;
        $documentPath = null;

        if ($request->hasFile('avatar')) {
            $avatarPath = $this->fileUploader->upload($request->file('avatar'), Profile::AVATAR_PATH);
        }

        if ($request->hasFile('death_certificate')) {
            $documentPath = $this->fileUploader->upload($request->file('death_certificate'), Profile::DOCUMENTS_PATH);
        }

        if ($images = $request->file('profile_images')) {
            foreach ($images as $image) {
                $images_path = $this->fileUploader->upload($image, Profile::GALLERY_PATH);
            }
        }

        $profile = Profile::make();

        dd($avatarPath);
    }
}
