<?php

namespace Database\Factories\Community\Posts;

use App\Models\Community\Community;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'author_id' => User::query()->inRandomOrder()->value('id'),
            'community_id' => Community::query()->inRandomOrder()->value('id'),
            'published_at' => now()
         ];
    }
}
