<?php

namespace App\Http\Resources\Community;

use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityMemorialResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Human|Pet|JsonResource $this */

        return [
            'full_name' =>  $this->getFullNameAttribute(),
            'year_birth' => $this->date_birth,
            'year_death' => $this->date_death,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
        ];
    }
}
