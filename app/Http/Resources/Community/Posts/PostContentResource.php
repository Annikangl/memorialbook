<?php

namespace App\Http\Resources\Community\Posts;

use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use Illuminate\Http\Resources\Json\JsonResource;

class PostContentResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var TextPost|JsonResource $this */

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'gallery' => $this->getPostMedia(),
        ];
    }
}
