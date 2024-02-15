<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Http\Resources\Json\JsonResource;

class CreatedHumanResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Human|JsonResource $this */

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'gender' => $this->gender,
            'date_birth' => $this->date_birth->format('d.m.Y'),
            'date_death' => $this->date_death->format('d.m.Y'),
            'death_reason' => $this->death_reason,
            'burial_place' => $this->burial_place,
            'burial_coords' => $this->burial_coords,
            'father_id' => $this->father_id,
            'mother_id' => $this->mother_id,
            'spouse_id' => $this->spouse_id,
            'description' => $this->description,
            'hobbies' => $this->hobbies,
            'religion' => $this->whenLoaded('religion', $this->religion->title),
            'access' => $this->access,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
            'banner' => $this->getFirstMediaUrl('banners', 'thumb_500'),
            'death_certificate' => $this->getFirstMediaUrl('attached_document'),
            'gallery' => $this->getGallery(),
        ];
    }

}
