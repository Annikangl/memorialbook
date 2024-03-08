<?php

namespace Database\Factories\Shop;

use App\Models\Profile\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'cemetery_id' => Cemetery::query()->inRandomOrder()->value('id'),
            'name' => ucfirst($this->faker->word()),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
