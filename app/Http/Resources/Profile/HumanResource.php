<?php

namespace App\Http\Resources\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class HumanResource extends JsonResource
{
    public bool $preserveKeys = true;
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

        // TODO move to resource collection
        $relatives = Human::withRelatives()->get()->map(function ($item) {
            return [
                'full_name' => $item->fullName,
                'avatar' => $item->getFirstMediaUrl('avatars')
            ];
        });

        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'death_reason' => $this->death_reason,
            'description' => $this->description,
            'life_expectancy' => $this->life_expectancy,
            'relatives' => $relatives,
            'avatar' => $this->getFirstMediaUrl('avatars'),
            'hobbies' => $this->hobbies->pluck('title'),
            'gallery' => $gallery
        ];
    }
}
