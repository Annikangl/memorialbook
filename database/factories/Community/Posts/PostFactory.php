<?php

namespace Database\Factories\Community\Posts;

use App\Models\Community\Community;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_id' => User::query()->inRandomOrder()->value('id'),
            'title' => $this->faker->words(10, true),
            'description' => $this->faker->realText(),
            'published_at' => now()
         ];
    }
}
