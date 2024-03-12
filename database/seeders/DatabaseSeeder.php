<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRole;
use App\Models\Community\Community;
use App\Models\Community\CommunityProfile;
use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Human\Religion;
use App\Models\Profile\Pet\Pet;
use App\Models\Shop\ProductCategory;
use App\Models\User\User;
use Faker\Provider\UserAgent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
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
        $faker->addProvider(new FakerPicsumImagesProvider($faker));

//        $categories = ProductCategory::factory(10)->create();

        $this->createUsers();

        $cemeteries = Cemetery::factory(10)
            ->create();

        foreach ($cemeteries as $cemetery) {
            $cemetery->addMedia($faker->image(storage_path('app/images')))
                ->toMediaCollection('banners');
        }

        $humans = Human::factory(15)
            ->create();

        foreach ($humans as $human) {
            $human->addMedia($faker->image(storage_path('app/images'),350,300))
                ->toMediaCollection('avatars');

            for ($i = 0; $i < 5; $i++) {
                $human->addMedia($faker->image(storage_path('app/images'),1280,720))
                    ->toMediaCollection('gallery');
            }
        }

        $pets = Pet::factory(10)
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

        $communities = Community::factory(10)
//            ->hasPosts(5)
            ->hasUsers(30)
            ->create();

        CommunityProfile::factory(15)->create();

        /** @var Community $community */

        foreach ($communities as $community) {
            $community->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                ->toMediaCollection('avatars');

            $community->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                ->toMediaCollection('banners');

            for ($i = 0; $i < 5; $i++) {
                $community->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                    ->toMediaCollection('gallery');
            }

            $community->posts()->each(function (Post $post) use ($faker) {
                for ($i = 0; $i < 5; $i++) {
                    $post->addMedia($faker->image(storage_path('app/images'), 1280, 720))
                        ->toMediaCollection('gallery');
                }
            });
        }
    }

    private function createUsers(): void
    {
        User::query()->create([
            'username' => 'Ivanov Ivan',
            'email' => 'test@gmail.com',
            'password' => \Hash::make('test1234'),
            'role' => UserRole::ROLE_USER,
            'fcm_token' => Str::random(50),
            'device_name' => UserAgent::userAgent(),
            'location' => 'RU',
        ]);
    }
}
