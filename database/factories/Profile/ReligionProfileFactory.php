<?php

namespace Database\Factories\Profile;

use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReligionProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profile_id'=>Profile::query()->inRandomOrder()->first('id'),
            'religion_id'=>Religion::query()->inRandomOrder()->first('id'),
        ];
    }
}
