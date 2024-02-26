<?php

namespace Database\Factories\Community\Posts;

use Illuminate\Database\Eloquent\Factories\Factory;

class TextWithMediaPostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(),
            'description' => $this->faker->text(),
            'created_at' => now()
        ];
    }
}
