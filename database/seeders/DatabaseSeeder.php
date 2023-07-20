<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cemetery\Cemetery;
use App\Models\Community\Community;
use App\Models\Community\Posts\Post;
use App\Models\Profile\Hobby;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Faker\Provider\UserAgent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class DatabaseSeeder extends Seeder
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        $this->createUsers();

        Religion::factory(10)->create();
        Hobby::factory(10)->create();

        Cemetery::factory(30)
            ->create();

        $humans = Human::factory(30)
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
                ->toMediaCollection('banners');

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

            $community->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                ->toMediaCollection('banners');
        }

        foreach (User::all() as $user) {
            $user->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                ->toMediaCollection('avatars');
        }
    }

    private function createUsers(): void
    {
        User::create([
            'username' => 'Ivanov Ivan',
            'email' => 'test@gmail.com',
            'password' => \Hash::make('test1234'),
            'fcm_token' => Str::random(50),
            'device_name' => UserAgent::userAgent(),
            'location' => 'RU',
        ]);

        User::create([
            'username' => 'Petrov Petr',
            'email' => 'test2@gmail.com',
            'password' => \Hash::make('test1234'),
            'fcm_token' => Str::random(50),
            'device_name' => UserAgent::userAgent(),
            'location' => 'DE',
        ]);
    }
}
