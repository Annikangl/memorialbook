<?php

namespace App\Http\Resources\User\Event;

use App\Models\Event\Event;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Event|JsonResource $this */

        return [
            'id' => $this->id,
            'type' => $this->event_type,
            'title' => $this->title,
            'description' => $this->description,
            'author_avatar' => $this->author_avatar_url,
            'image' => $this->image_url,
        ];
    }
}
