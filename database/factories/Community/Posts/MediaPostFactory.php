<?php

namespace Database\Factories\Community\Posts;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaPostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'path' => $this->faker->filePath(),
        ];
    }
}
