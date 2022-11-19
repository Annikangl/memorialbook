<?php

namespace Database\Factories\Profile;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human\Religion>
 */
class ReligionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10)
        ];
    }
}
