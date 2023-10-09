<?php

namespace App\Http\Resources\Cabinet;

use App\Models\User\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var User $this */

        $this->loadCount(['pets', 'humans', 'availableProfiles']);

        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => $this->getFirstMediaUrl('avatar', 'thumb'),
            'profiles_count' => $this->pets_count + $this->humans_count,
            'accesses_count' => $this->available_profiles_count
        ];
    }
}
