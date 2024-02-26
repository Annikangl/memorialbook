<?php

namespace App\Http\Resources\Community\Posts;

use App\Http\Resources\UserResource;
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
            'content_type' => $this->content_type,
            'published_at' => $this->published_at?->format('M d, Y'),
            'author' => new UserResource($this->author),
            'content' => new PostContentResource($this->postable)
        ];
    }
}
