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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500'),
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'created_at' => $this->created_at
        ];
    }
}
