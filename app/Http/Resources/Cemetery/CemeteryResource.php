<?php

namespace App\Http\Resources\Cemetery;

use App\Models\Cemetery\Cemetery;
use Illuminate\Http\Resources\Json\JsonResource;

class CemeteryResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Cemetery $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500')
        ];
    }
}
