<?php

namespace Database\Factories\Profile\Pet;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Human\PetGallery>
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
            'item' => 'uploads/pets/img-2.png',
            'extension' => 'png'
        ];
    }
}
