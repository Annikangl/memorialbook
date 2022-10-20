<?php

namespace Database\Factories\Profile;

use App\Models\Profile\Profile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'patronymic' => $this->faker->name(),
            'avatar' => $this->faker->randomElement(
                [
                    'avatar_profile/YecDyQ7H4e7HydHbRqQr89AAQwG7DJ0aQ1wunwYq.jpg',
                    'avatar_profile/rXmKCVJDTn2IW00VmpgejetE5BOAEY4srx5AcimZ.jpg'
                ]
            ),
            'description' => $this->faker->text(),
            'gender' => $this->faker->titleMale(),
            'date_birth' => $birth = $this->faker->date("Y-m-d", '2000'),
            'date_death' => Carbon::createFromFormat('Y-m-d', $birth)->addYears(25),
            'birth_place' => $this->faker->address(),
            'burial_place' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'reason_death' => $this->faker->text(10),
            'death_certificate' => null,
            'status' => Profile::STATUS_ACTIVE,
            'moderators_comment' => null,
            'access' => null,
            'spouse_id' =>  null,
            'child_id' =>  null,
            'mother_id' =>  null,
            'father_id' =>  null,
            'published_at' => Carbon::now()
        ];
    }
}
