<?php

namespace Database\Factories\Event;

use App\Models\Event\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'event_type' => $this->faker->randomElement([]),
            'title' => $this->faker->words(),
            'description' => $this->faker->text(100),
            'author_avatar_url' => $this->faker->imageUrl(),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
