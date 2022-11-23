<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Models\Community\Community;

class CommunityService
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function create(int $userId, array $data): Community
    {
        $avatarPath = null;
        $bannerPath = null;

        if (isset($data['avatar'])) {
            $avatarPath = $this->fileUploader->upload($data['avatar'], Community::AVATAR_PATH);
        }

        if (isset($data['community_banner'])) {
            $bannerPath = $this->fileUploader->upload($data['community_banner'], Community::BANNER_PATH);
        }

        /** @var Community $community */
        $community = Community::make([
            'title' => $data['title'],
            'address' => $data['community_address'],
            'latitude' => $data['community_address_coords']['lat'],
            'longitude' => $data['community_address_coords']['lng'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'description' => $data['description'],
            'avatar' => $avatarPath,
            'banner' => $bannerPath
        ]);

        $community->owner()->associate($userId);

        $community->save();

        if (isset($data['community_documents'])) {
            $this->uploadDocuments($data['community_documents'], $community);
        }

        if (isset($data['community_gallery'])) {
            $this->uploadGalleries($data['community_gallery'], $community);
        }

        return $community;
    }

    private function uploadGalleries(array $files, Community $community): void
    {
        foreach ($files as $item) {
            $imagePath = $this->fileUploader->upload($item, Community::GALLERY_PATH);

            $community->galleries()->create([
                'community_id' => $community->id,
                'item' => $imagePath,
                'extension' => $item->getExtension()
            ]);
        }
    }

    private function uploadDocuments(array $files, Community $community): void
    {
        foreach ($files as $item) {
            $imagePath = $this->fileUploader->upload($item, Community::DOCUMENTS_PATH);

            $community->documents()->create([
                'community_id' => $community->id,
                'item' => $imagePath,
            ]);
        }
    }
}
