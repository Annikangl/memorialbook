<?php

namespace App\Http\Resources\Community;

use App\Models\Community\Community;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Community $this */

        return [
            'id' => $this->id,
            'is_owner' => $this->isOwner(auth('sanctum')->id()),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_900'),
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'created_at' => $this->created_at
        ];
    }
}
