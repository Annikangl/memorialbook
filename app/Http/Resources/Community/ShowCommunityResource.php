<?php

namespace App\Http\Resources\Community;

use App\Http\Resources\Community\Posts\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Community\Community;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowCommunityResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Community|JsonResource $this */

        return [
            'id' => $this->id,
            'is_subscribe' =>  $this->isUserSubscribed(auth('sanctum')->user()),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_900'),
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'pictures' => $this->getPictures(),
            'movies' => $this->getMovies(),
            'subscribers_count' => $this->users_count,
            'posts' => PostResource::collection($this->posts),
            'subscribers' => UserResource::collection($this->users),
            'memorials' => CommunityMemorialResource::collection(
                $this->communityProfiles->map(function ($communityProfile) {
                    return $communityProfile->profileable;
                })
            )
        ];
    }
}
