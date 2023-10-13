<?php

namespace App\Http\Resources\Community\Posts;

use App\Models\Community\Posts\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Post|JsonResource $this */

        return [
            'id' => $this->id,
            'is_pinned' => $this->is_pinned,
            'title' => $this->title,
            'description' => $this->description,
            'published_at' => $this->published_at,
            'gallery' => $this->getGallery(),
        ];
    }
}