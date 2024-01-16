<?php

namespace Database\Factories\Event;

use App\Models\Event\Event;
use App\Models\Event\EventUser;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventUserFactory extends Factory
{
    protected $model = EventUser::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'event_id' => Event::inRandomOrder()->value('id'),
            'is_viewed' => $this->faker->boolean(),
        ];
    }
}
