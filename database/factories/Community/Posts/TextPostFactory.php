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
            'title' => $this->faker->words(),
            'description' => $this->faker->text(),
        ];
    }
}
