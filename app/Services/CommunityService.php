<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Community\Community;

class CommunityService
{

    public function create(int $userId, array $data): Community
    {
        $community = Community::query()->make([
            'title' => $data['title'],
            'address' => $data['community_address'],
            'latitude' => $data['community_address_coords']['lat'],
            'longitude' => $data['community_address_coords']['lng'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'description' => $data['description'],
        ]);

        $community->owner()->associate($userId);

        $community->save();

        if (isset($data['avatar'])) {
            $community->addMedia($data['avatar'])->toMediaCollection('avatars');
        }

        if (isset($data['community_banner'])) {
            $community->addMedia('community_banner')->toMediaCollection('banners');
        }

        if (isset($data['community_documents'])) {
            $community->addMedia('community_documents')->toMediaCollection('documents');
        }

        if (isset($data['community_gallery'])) {
            foreach ($data['community_gallery'] as $item) {
                $community->addMedia($item)->toMediaCollection('gallery');
            }
        }

        return $community;
    }
}
