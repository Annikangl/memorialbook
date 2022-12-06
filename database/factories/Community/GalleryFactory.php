<?php

namespace Database\Factories\Community;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community\Gallery>
 */
class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item' => $this->faker->randomElement(
                [
                    'uploads/community/avatar-1.png',
                    'uploads/community/avatar-2.png',
                    'uploads/community/avatar-3.png',
                    'uploads/community/avatar-4.png',
                    'uploads/community/avatar-5.png',
                ]
            ),
            'extension' => 'png'
        ];
    }
}
