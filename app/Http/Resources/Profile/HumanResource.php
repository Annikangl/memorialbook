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
            'date_birth' => $this->date_birth,
            'date_death' => $this->date_death,
            'year_birth' => $this->year_birth,
            'year_death' => $this->year_death,
            'burial_coords' => $this->burial_coords,
            'is_celebrity' => $this->is_celebrity,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb')
        ];
    }
}
