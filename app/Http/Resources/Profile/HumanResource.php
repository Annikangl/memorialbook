<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Http\Resources\Json\JsonResource;

class HumanResource extends JsonResource
{

    public function toArray($request): array
    {
        /** @var Human $this */

        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'date_birth' => $this->year_birth,
            'date_death' => $this->year_death,
            'burial_cord' => $this->burial_coords,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb')
        ];
    }
}
