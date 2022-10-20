<?php

namespace Database\Factories\Profile;

use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HobbiesProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profile_id' => Profile::query()->inRandomOrder()->first('id'),
            'religion_id' => Hobby::query()->inRandomOrder()->first('id'),
        ];
    }
}
