<?php

namespace App\Http\Resources\Cemetery;

use App\Http\Resources\Profile\HumanResource;
use App\Models\Profile\Cemetery\Cemetery;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowCemeteryResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Cemetery|JsonResource $this */

        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'address_coords' => $this->address_coords,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500'),
            'gallery' => $this->getGallery(),
            'memorials' => HumanResource::collection($this->memorials),
            'famous_personalities' => HumanResource::collection(
                $this->memorials->where('is_celebrity', true)
            )
        ];
    }
}
