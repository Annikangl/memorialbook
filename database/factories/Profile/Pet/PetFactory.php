<?php

namespace Database\Factories\Profile\Pet;

use App\Models\Profile\DeathReason;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human\Pet>
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
            'name' => $this->faker->firstName(),
            'description' => $this->faker->realText(),
            'breed' => $this->faker->words(2, true),
            'avatar' => $this->faker->randomElement(
                [
                    'uploads/pets/img-1.webp',
                ]
            ),
            'banner' => 'uploads/pets/banner.webp',
            'date_birth' => now()->subYears(random_int(1,10)),
            'date_death' => now()->addYears(10),
            'birth_place' => $this->faker->address,
            'burial_place' => $this->faker->address,
            'death_reason' => DeathReason::query()->inRandomOrder()->value('title'),
        ];
    }
}
