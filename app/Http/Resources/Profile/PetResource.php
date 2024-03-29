<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Pet\Pet;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Pet|JsonResource $this */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'date_birth' => $this->date_birth->format('d.m.Y'),
            'date_death' => $this->date_death->format('d.m.Y'),
            'year_birth' => $this->year_birth,
            'year_death' => $this->year_death,
            'is_celebrity' => $this->is_celebrity,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
        ];
    }
}
