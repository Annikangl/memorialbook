<?php

namespace Database\Factories\Profile\Pet;

use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pet\Pet>
 */
class PetFactory extends Factory
{
    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'owner_id' => Human::query()->inRandomOrder()->value('id'),
            'name' => $this->faker->firstName(),
            'description' => $this->faker->realText(),
            'breed' => $this->faker->words(2, true),
            'date_birth' => $birth = $this->faker->date("Y-m-d", '2000'),
            'date_death' => Carbon::createFromFormat('Y-m-d', $birth)->addYears(25),
            'birth_place' => $this->faker->address,
            'burial_place' => $this->faker->address,
            'death_reason' => $this->faker->words(2, true),
            'is_celebrity' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(Profile::statusList()),
            'access' => $this->faker->randomElement(Profile::getAccessList()),
        ];
    }
}
