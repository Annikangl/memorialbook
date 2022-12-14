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
            'title' => $title = $this->faker->text(25),
            'title_en' => str($title)->slug(),
            'subtitle' => $this->faker->sentence(3),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'schedule' => 'Пн-Сб: 09:00 - 20:00 / Вс: 09:00 - 22:00',
            'address' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'avatar' => $this->faker->randomElement(
                [
                    'uploads/cemeteries/avatar/avatar-1.jpg',
                    'uploads/cemeteries/avatar/avatar-2.jpg',
                    'uploads/cemeteries/avatar/avatar-3.jpg',
                    'uploads/cemeteries/avatar/avatar-4.jpg',
                ]
            ),
            'banner' => 'uploads/cemetery/banner/img.png',
            'description' => $this->faker->realText(1000),
            'status' => Cemetery::STATUS_ACTIVE,
            'moderators_comment' => null,
            'access' => Cemetery::ACCESS_OPEN
        ];
    }
}
