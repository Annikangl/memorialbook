<?php

namespace Database\Factories\Profile\Human;

use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Human>
 */
class HumanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'cemetery_id' => Cemetery::query()->inRandomOrder()->value('id'),
            'religion_id' => Religion::query()->inRandomOrder()->value('id'),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'description' => $this->faker->text(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_birth' => $birth = $this->faker->date('Y-m-d', '2000'),
            'date_death' => Carbon::parse($birth)->addYears(40),
            'birth_place' => $this->faker->address(),
            'burial_place' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'death_reason' => $this->faker->words(2, true),
            'status' => Profile::STATUS_ACTIVE,
            'is_celebrity' => $this->faker->boolean,
            'moderators_comment' => null,
            'access' => Human::ACCESS_PUBLIC,
            'published_at' => Carbon::now()
        ];
    }
}
