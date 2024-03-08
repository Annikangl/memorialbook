<?php

namespace Database\Factories\Shop;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $name = ucfirst($this->faker->word()),
            'slug' => Str::slug($name)
        ];
    }
}
