<?php

namespace Database\Factories\Community\Posts;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community\Posts\Gallery>
 */
class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item' => $this->faker->randomElement(
                [
                    'uploads/community/poster.png',
                    'uploads/community/poster.png',
                    'uploads/community/poster.png',
                    'uploads/community/img-1.jpg',
                    'uploads/community/img-2.png',
                ]
            ),
            'extension' => 'png'
        ];
    }
}
