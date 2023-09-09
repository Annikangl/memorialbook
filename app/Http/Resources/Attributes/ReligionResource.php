<?php

namespace App\Http\Resources\Attributes;

use Illuminate\Http\Resources\Json\JsonResource;

class ReligionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title
        ];
    }
}
