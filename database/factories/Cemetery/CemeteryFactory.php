<?php

namespace Database\Factories\Cemetery;

use App\Models\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cemetery>
 */
class CemeteryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'title' => $title = $this->faker->text(30),
            'title_en' => str($title)->slug(),
            'subtitle' => $this->faker->words(10, true),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'schedule' => 'Пн-Сб: 09:00 - 20:00 / Вс: 09:00 - 22:00',
            'address' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'description' => $this->faker->realText(1000),
            'status' => Cemetery::STATUS_ACTIVE,
            'access' => Cemetery::ACCESS_PUBLIC,
            'moderators_comment' => null,
        ];
    }
}
