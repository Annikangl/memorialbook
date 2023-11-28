<?php

namespace App\Services\Community;

use App\DTOs\Community\CommunityPostDTO;
use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use App\Models\User\User;

class PostService
{
    public function create(CommunityPostDTO $communityPostDTO, User $user): Post
    {
        $post = Post::query()->create([
            'author_id' => $user->id,
            'title' => $communityPostDTO->title,
            'community_id' => $communityPostDTO->community_id,
            'content_type' => $communityPostDTO->content_type,
            'is_pinned' => $communityPostDTO->is_pinned
        ]);

        return $this->createPostContent($post, $communityPostDTO);
    }

    protected function createPostContent(Post $post, CommunityPostDTO $communityPostDTO): Post
    {
        switch ($communityPostDTO->content_type) {
            case Post::TYPE_TEXT:
                return TextPost::query()->create([
                    'post_id' => $post->id,
                    'text' => $communityPostDTO->description
                ]);
            case Post::TYPE_MEDIA:
                // TODO
        }
    }

}
