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
            'patronymic' => $this->faker->domainName(),
            'avatar' => Storage::path('profiles'),
            'gender' => $this->faker->titleMale(),
            'date_birth' => $birth = $this->faker->date("Y-m-d",'2000'),
            'date_death' => Carbon::createFromFormat('Y-m-d', $birth)->addYears(25),
            'birth_place' => $this->faker->address(),
            'burial_place' => $this->faker->address(),
            'reason_death' => $this->faker->text(10),
            'death_certificate' => null,
            'religious_views' => $this->faker->randomElement(['christianity', 'Islam', 'buddhism']),
            'hobby' => $this->faker->text(30),
            'status' => Profile::STATUS_ACTIVE,
            'moderators_comment' =>  null,
            'access' => null,
            'p_id' => null,
            'm_id' => null,
            'f_id' => null,
            'published_at' => Carbon::now()
        ];
    }
}
