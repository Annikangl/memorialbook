<?php

namespace Database\Factories\Community\Posts;

use App\Models\Community\Community;
use App\Models\Community\Posts\MediaPost;
use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'author_id' => User::query()->inRandomOrder()->value('id'),
            'community_id' => Community::query()->inRandomOrder()->value('id'),
            'postable_type' => $type = $this->faker->randomElement([
                MediaPost::class,
                TextPost::class
            ]),
            'postable_id' => TextPost::inRandomOrder()->value('id'),
            'content_type' => Post::TYPE_TEXT,
            'published_at' => now()
         ];
    }
}
