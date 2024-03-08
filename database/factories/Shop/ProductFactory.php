<?php

namespace Database\Factories\Shop;

use App\Models\Shop\ProductCategory;
use App\Models\Shop\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'shop_id' => Shop::query()->inRandomOrder()->value('id'),
            'shop_product_category_id' => ProductCategory::query()->inRandomOrder()->value('id'),
            'name' => ucfirst($this->faker->word()),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(5,100),
        ];
    }
}
