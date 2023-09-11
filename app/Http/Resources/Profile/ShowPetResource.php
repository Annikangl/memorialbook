<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Pet\Pet;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPetResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Pet|JsonResource $this */

        return [
            'id' => $this->id,
            'owner' => HumanResource::make($this->owner),
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500'),
            'name' => $this->name,
            'date_birth' => $this->date_birth,
            'date_death' => $this->date_death,
            'death_reason' => $this->death_reason,
            'description' => $this->description,
            'gallery' => $this->getGallery(),
        ];
    }
}
