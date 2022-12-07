<?php

namespace Database\Factories\Profile\Human;

use App\Models\Cemetery\Cemetery;
use App\Models\Profile\DeathReason;
use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human>
 */
class HumanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cemetery_id' => Cemetery::query()->inRandomOrder()->value('id'),
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'spouse_id' =>  null,
            'child_id' =>  null,
            'mother_id' =>  null,
            'father_id' =>  null,

            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'avatar' => $this->faker->randomElement(
                [
                    'uploads/profiles/avatar/avatar-1.webp',
                    'uploads/profiles/avatar/avatar-2.webp',
                    'uploads/profiles/avatar/avatar-3.webp',
                    'uploads/profiles/avatar/avatar-4.webp',
                ]
            ),
            'description' => $this->faker->text(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_birth' => $birth = $this->faker->date("Y-m-d", '2000'),
            'date_death' => Carbon::createFromFormat('Y-m-d', $birth)->addYears(25),
            'birth_place' => $this->faker->address(),
            'burial_place' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'death_reason' => DeathReason::query()->inRandomOrder()->value('title'),
            'death_certificate' => null,
            'status' => Human::STATUS_ACTIVE,
            'moderators_comment' => null,
            'access' => null,
            'published_at' => Carbon::now()
        ];
    }
}
