<?php

namespace Database\Factories\Profile\Human;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human\Gallery>
 */
class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item' => $this->faker->randomElement(
                [
                    'uploads/profiles/gallery/gallery-1.jpg',
                    'uploads/profiles/gallery/gallery-2.jpg',
                    'uploads/profiles/gallery/gallery-3.jpg',
                    'uploads/profiles/gallery/gallery-4.jpg',
                    'uploads/profiles/gallery/gallery-5.jpg',
                ]
            ),
            'item_sm' => $this->faker->randomElement(
                [
                    'uploads/profiles/gallery/gallery-small-1.jpg',
                    'uploads/profiles/gallery/gallery-small-2.jpg',
                    'uploads/profiles/gallery/gallery-small-3.jpg',
                    'uploads/profiles/gallery/gallery-small-4.jpg',
                    'uploads/profiles/gallery/gallery-small-5.jpg',
                ]
            ),
            'extension' => 'jpg'
        ];
    }
}
