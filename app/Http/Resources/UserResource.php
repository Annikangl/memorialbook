<?php

namespace App\Http\Resources;

use App\Models\User\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        /** @var User $this */
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
            'avatar' => asset('storage/' . $this->avatar),
        ];
    }
}
