<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cemetery\Cemetery;
use App\Models\Cemetery\Gallery;
use App\Models\Community\Community;
use App\Models\Community\Posts\Post;
use App\Models\Profile\Hobby;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Database\Seeders\Profile\DeathReasonSeeder;
use Faker\Provider\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();
//        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        $this->createUsers();

        Religion::factory(10)->create();
        Hobby::factory(10)->create();

        $this->call(DeathReasonSeeder::class);

        Cemetery::factory(30)
            ->create();

        $humans = Human::factory(30)
            ->has(Cemetery::factory()->count(3))
            ->has(Hobby::factory()->count(3))
            ->has(Religion::factory()->count(3))
            ->create();

        foreach ($humans as $human) {
            $human->addMedia($faker->image(storage_path('app/images'),350,300))
                ->toMediaCollection('avatars');

            for ($i = 0; $i < 5; $i++) {
                $human->addMedia($faker->image(storage_path('app/images'),1280,720))
                    ->toMediaCollection('gallery');
            }
        }

        $pets = Pet::factory(15)
            ->create();

        foreach ($pets as $pet) {
            $pet->addMedia($faker->image(storage_path('app/images'),350,300))
                ->toMediaCollection('avatars');
            $pet->addMedia($faker->image(storage_path('app/images'),1280,720))
                ->toMediaCollection('banner');

            for ($i = 0; $i < 5; $i++) {
                $pet->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                    ->toMediaCollection('gallery');
            }
        }

        $communities = Community::factory(5)
            ->has(Post::factory(5))
            ->has(User::factory()->count(30))
            ->has(Human::factory(5))
            ->has(Pet::factory(5))
            ->create();

        foreach ($communities as $community) {
            $community->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                ->toMediaCollection('avatars');
        }
    }

    private function createUsers(): void
    {
        User::create([
            'username' => 'Ivanov Ivan',
            'email' => 'test@gmail.com',
            'password' => \Hash::make('test1234'),
            'avatar' => User::AVATAR_PATH . '/empty_user_avatar.webp',
        ]);

        User::create([
            'username' => 'Petrov Petr',
            'email' => 'test2@gmail.com',
            'password' => \Hash::make('test1234'),
            'avatar' => User::AVATAR_PATH . '/empty_user_avatar.webp',
        ]);
    }
}
