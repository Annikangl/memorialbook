<?php

namespace Database\Factories\Profile;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile\Pet>
 */
class PetFactory extends Factory
{
    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'name' => $this->faker->name(),
            'breed' => $this->faker->words(2, true),
            'avatar' => $this->faker->randomElement(
                [
                    'uploads/pets/img-1.png',
                    'uploads/pets/img-2.png'
                ]
            ),
            'banner' => 'uploads/pets/banner.jpg',
            'birth_date' => now()->subYears(random_int(1,10)),
            'death_date' => now()->addYears(10),
            'facebook' => 'https://facebook.com',
        ];
    }
}
