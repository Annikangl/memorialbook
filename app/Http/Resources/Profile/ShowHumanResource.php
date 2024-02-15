<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowHumanResource extends JsonResource
{

    public function toArray($request): array
    {
        /** @var Human|JsonResource $this */

        return [
            'id' => $this->id,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500'),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'date_birth' => $this->date_birth->format('d.m.Y'),
            'date_death' => $this->date_death->format('d.m.Y'),
            'death_reason' => $this->death_reason,
            'hobbies' => $this->hobbies,
            'religion' => $this->whenLoaded('religion', $this->religion->title ?? null),
            'description' => $this->description,
            'gallery' => $this->getGallery(),
        ];
    }
}
