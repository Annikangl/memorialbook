<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Cemetery\Cemetery;

class CemeteryService
{
    public function create(array $data, int $userId): Cemetery
    {
        try {
            return \DB::transaction(function () use ($data, $userId) {
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
                   'description' => $data['description'],
                   'status' => Cemetery::STATUS_MODERATION,
                   'access' => $data['settings-public']
               ]);

               $cemetery->user()->associate($userId);
               $cemetery->save();

                if (isset($data['avatar'])) {
                    $cemetery->addMedia($data['avatar'])->toMediaCollection('avatars');
                }

                if (isset($data['input-banner'])) {
                    $cemetery->addMedia($data['input-banner'])->toMediaCollection('banners');
                }

               if (isset($data['cemetery_gallery'])) {
                   foreach ($data['cemetery_gallery'] as $item) {
                       $cemetery->addMedia($item)->toMediaCollection('gallery');
                   }
               }

               return $cemetery;
            });
        } catch (\Throwable $exception) {
            throw new \DomainException($exception->getMessage());
        }
    }
}
