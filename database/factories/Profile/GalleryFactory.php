<?php

namespace Database\Factories\Profile;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
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
