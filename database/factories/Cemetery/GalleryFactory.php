<?php

namespace Database\Factories\Cemetery;

use App\Models\Cemetery\Cemetery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cemetery_id' => Cemetery::query()->inRandomOrder()->value('id'),
            'item' => 'uploads/cemeteries/gallery/2-small.jpg'
        ];
    }
}
