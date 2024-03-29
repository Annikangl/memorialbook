<?php

namespace Database\Factories\User;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => $this->faker->randomElement([
                UserRole::ROLE_USER,
                UserRole::ROLE_SELLER
            ]),
            'password' => \Hash::make('test1234'), // password
            'remember_token' => Str::random(10),
            'fcm_token' => $this->faker->sha256(),
            'device_name' => $this->faker->userAgent(),
            'location' => $this->faker->locale()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
