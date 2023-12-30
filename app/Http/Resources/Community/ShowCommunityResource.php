<?php

namespace App\Http\Resources\Community;

use App\Http\Resources\Community\Posts\PostResource;
use App\Http\Resources\Profile\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\Community\Community;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ShowCommunityResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Community|JsonResource $this */

        $user = auth('sanctum')->user();

        return [
            'id' => $this->id,
            'is_subscribe' => $this->isUserSubscribed($user),
            'is_admin' => $user ? $user->isCommunityOwner($this->getModel()) : false,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_900'),
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'pictures' => $this->getPictures(),
            'movies' => $this->getMovies(),
            'subscribers_count' => $this->users_count,
            'posts' => $this->whenLoaded('posts', PostResource::collection($this->posts)),
            'subscribers' => UserResource::collection($this->users),
            'memorials' => $this->whenLoaded('communityProfiles', ProfileResource::collection($this->communityProfiles)),
        ];
    }
}
