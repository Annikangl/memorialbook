<?php

namespace Database\Factories\Community\Posts;

use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TextPostFactory extends Factory
{
    protected $model = TextPost::class;

    public function definition(): array
    {
        return [
            'text' => $this->faker->text(),
            'post_id' => Post::query()->inRandomOrder()->value('id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
