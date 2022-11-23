<?php

namespace Database\Factories\Community;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community\Community>
 */
class CommunityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'owner_id' => 1,
            'email' => $this->faker->email,
            'website' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'title' => $this->faker->words(3,true),
            'subtitle' => $this->faker->text(),
            'description' => $this->faker->realText(400),
            'avatar' => 'uploads/community/logo.png',
            'banner' => 'uploads/community/community-banner.png',
        ];
    }
}
