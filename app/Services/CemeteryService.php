<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Cemetery\Cemetery;

class CemeteryService
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function create(array $data, int $userId): Cemetery
    {
        $avatarPath = null;
        $bannerPath = null;

        try {
            if (isset($data['avatar'])) {
                $avatarPath = $this->fileUploader->upload($data['avatar'], Cemetery::AVATAR_PATH);
            }

            if (isset($data['input-banner'])) {
                $bannerPath = $this->fileUploader->upload($data['input-banner'], Cemetery::BANNER_PATH);
            }

            return \DB::transaction(function () use ($data, $avatarPath, $bannerPath, $userId) {
               $cemetery = Cemetery::query()->make([
                   'title' => $data['title'],
                   'title_en' => $data['title_en'],
                   'subtitle' => $data['subtitle'],
                   'email' => $data['email'],
                   'phone' => $data['phone'],
                   'schedule' => $data['schedule'],
                   'address' => $data['cemetery_address'],
                   'latitude' => $data['cemetery_address_coords']['lat'] ?? null,
                   'longitude' => $data['cemetery_address_coords']['lng'] ?? null,
                   'avatar' => $avatarPath,
                   'banner' => $bannerPath,
                   'description' => $data['description'],
                   'status' => Cemetery::STATUS_MODERATION,
                   'access' => $data['settings-public']
               ]);

               $cemetery->user()->associate($userId);

               $cemetery->save();

               if (isset($data['cemetery_gallery'])) {
                   foreach ($data['cemetery_gallery'] as $item) {
                       $imagePath = $this->fileUploader->upload($item, Cemetery::GALLERY_PATH);

                       $cemetery->galleries()->create([
                           'cemetery_id' => $cemetery->id,
                           'item' => $imagePath
                       ]);
                   }
               }

               return $cemetery;
            });
        } catch (\Exception $exception) {
            throw new \DomainException($exception->getMessage());
        }
    }
}
