<?php

namespace App\Http\Resources\Cabinet;

use App\Models\User\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var User $this */

        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => $this->getFirstMediaUrl('avatar', 'thumb'),
            'profiles_count' => $this->createdProfilesCount,
            'accesses_count' => 0
        ];
    }
}
