<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class HumanSearchResource extends JsonResource
{

    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        /** @var Human $this */
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'life_expectancy' => $this->life_expectancy,
            'avatar' => $this->getFirstMediaUrl('avatars', 'thumb'),
        ];
    }
}
