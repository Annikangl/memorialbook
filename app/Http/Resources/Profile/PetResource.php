<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Pet\Pet;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Pet $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'year_birth' => $this->date_birth,
            'year_death' => $this->date_death,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
        ];
    }
}
