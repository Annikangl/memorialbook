<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'shop_id' => Shop::query()->inRandomOrder()->value('id'),
            'name' => ucfirst($this->faker->word()),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10,100),
        ];
    }
}
