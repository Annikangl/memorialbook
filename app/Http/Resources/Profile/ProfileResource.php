<?php

namespace App\Http\Resources\Profile;

use App\Models\Community\CommunityProfile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Profile;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var CommunityProfile|JsonResource $this */

        return [
            'id' => $this->profileable->id,
            'full_name' => $this->profileable->fullName,
            'year_birth' => $this->profileable->date_birth,
            'year_death' => $this->profileable->date_death,
            'type' => $this->profileable->gender ? 'human' : 'pet',
            'avatar' => $this->profileable->getFirstMediaUrl('avatars', 'thumb')
        ];
    }
}
