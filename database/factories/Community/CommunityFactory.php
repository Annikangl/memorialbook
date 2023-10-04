<?php

namespace Database\Factories\Community;

use App\Models\Community\Community;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Community>
 */
class CommunityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'owner_id' => 1,
            'email' => $this->faker->unique()->email,
            'website' => $this->faker->url,
            'phone' => $this->faker->unique()->phoneNumber,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'title' => $this->faker->words(3,true),
            'subtitle' => $this->faker->text(),
            'description' => $this->faker->realText(400),
        ];
    }
}
