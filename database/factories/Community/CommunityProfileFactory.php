<?php

namespace Database\Factories\Community;

use App\Models\Community\Community;
use App\Models\Community\CommunityProfile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @extends Factory<CommunityProfile>
 */
class CommunityProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /** @var Human|Pet $profileable */
        $profileable = $this->faker->randomElement([
            Human::class,
            Pet::class
        ]);

        return [
            'community_id' => Community::query()->inRandomOrder()->value('id'),
            'profileable_type' => $profileable,
            'profileable_id' => $profileable::factory()
        ];
    }
}
