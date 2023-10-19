<?php

namespace App\Http\Resources\Cemetery;

use App\Models\Profile\Cemetery\Cemetery;
use Illuminate\Http\Resources\Json\JsonResource;

class CemeteryResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Cemetery|JsonResource $this */

        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'address_coords' => $this->address_coords,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500')
        ];
    }
}
