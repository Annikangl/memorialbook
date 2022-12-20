<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class HumanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        /** @var Human $this */
        $gallery = $this->media()->select('id', 'file_name', 'disk')->where('collection_name', 'gallery')
            ->simplePaginate(6);


        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'death_reason' => $this->death_reason,
            'life_expectancy' => $this->life_expectancy,
            'avatar' => $this->getFirstMediaUrl('avatars'),
            'gallery' => $gallery
        ];
    }
}
