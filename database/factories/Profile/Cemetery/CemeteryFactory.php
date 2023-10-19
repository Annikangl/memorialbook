<?php

namespace Database\Factories\Profile\Cemetery;

use App\Models\Profile\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Profile\Cemetery\Cemetery>
 */
class CemeteryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'is_celebrity' => $this->faker->boolean(),
            'title' => $title = $this->faker->text(30),
            'title_en' => str($title)->slug(),
            'subtitle' => $this->faker->words(10, true),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'schedule' => 'Пн-Сб: 09:00 - 20:00 / Вс: 09:00 - 22:00',
            'address' => $this->faker->address(),
            'address_coords' => $this->faker->randomElements([
                [
                    $this->faker->latitude(),
                    $this->faker->longitude()
                ], 2
            ]),
            'description' => $this->faker->realText(1000),
            'status' => \App\Models\Profile\Cemetery\Cemetery::STATUS_ACTIVE,
            'access' => Cemetery::ACCESS_PUBLIC,
            'moderators_comment' => null,
        ];
    }
}
