<?php

namespace Database\Factories\Profile;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human\Hobby>
 */
class HobbyFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10)
        ];
    }
}
