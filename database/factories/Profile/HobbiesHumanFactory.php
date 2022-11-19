<?php

namespace Database\Factories\Profile;

use App\Models\Profile\Hobby;
use App\Models\Profile\Human\Human;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HobbiesHumanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'profile_id' => Human::query()->inRandomOrder()->first('id'),
            'religion_id' => Hobby::query()->inRandomOrder()->first('id'),
        ];
    }
}
