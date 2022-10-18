<?php

namespace Database\Factories;

use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
            'gender' => $this->faker->titleMale(),
            'date_birth' => $birth = $this->faker->date("Y-m-d", '2000'),
            'date_death' => Carbon::createFromFormat('Y-m-d', $birth)->addYears(25),
            'birth_place' => $this->faker->address(),
            'burial_place' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'reason_death' => $this->faker->text(10),
            'death_certificate' => null,
            'religious_views' => $this->faker->randomElement(['christianity', 'Islam', 'buddhism']),
            'hobby' => $this->faker->text(30),
            'status' => Profile::STATUS_ACTIVE,
            'moderators_comment' => null,
            'access' => null,
            'p_id' => null,
            'm_id' => null,
            'f_id' => null,
            'published_at' => Carbon::now()
        ];
    }
}
