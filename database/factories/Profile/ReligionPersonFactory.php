<?php

namespace Database\Factories\Profile;

use App\Models\Profile\Human\Human;
use App\Models\Profile\Religion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReligionPersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'profile_id'=> Human::query()->inRandomOrder()->first('id'),
            'religion_id'=> Religion::query()->inRandomOrder()->first('id'),
        ];
    }
}
