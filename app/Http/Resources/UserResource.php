<?php

namespace App\Http\Resources;

use App\Models\User\User;
use Illuminate\Contracts\Support\Arrayable;
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
            'avatar' => $this->getFirstMediaUrl('avatar'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
