<?php

namespace Database\Factories\Profile\Human;

use App\Models\Profile\Cemetery\Cemetery;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Human\Religion;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Carbon\Carbon;
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
            'middle_name' => $this->faker->userName(),
            'description' => $this->faker->text(),
            'hobbies' => $this->faker->randomElement([
                ['Reading', 'Traveling', 'Photography', 'Gardening'],
                ['Reading', 'Photography', 'Gardening'],
            ]),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_birth' => $birth = $this->faker->date('Y-m-d', '2000'),
            'date_death' => Carbon::parse($birth)->addYears(40),
            'birth_place' => $this->faker->address(),
            'burial_place' => $this->faker->address(),
            'burial_coords' => [
                'lat' => $this->faker->latitude(),
                'lng' =>$this->faker->longitude()
            ],
            'death_reason' => $this->faker->words(2, true),
            'status' => $this->faker->randomElement(Profile::statusList()),
            'is_celebrity' => $this->faker->boolean,
            'moderators_comment' => null,
            'access' => $this->faker->randomElement(Profile::getAccessList()),
            'published_at' => Carbon::now()
        ];
    }
}
