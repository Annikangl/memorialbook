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
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createUsers();

        Religion::factory(10)->create();
        Hobby::factory(10)->create();

        $this->call(DeathReasonSeeder::class);

        Cemetery::factory(30)
            ->has(Gallery::factory()->count(5))
            ->create();

        Human::factory(30)
            ->has(Cemetery::factory()->count(3))
            ->has(Hobby::factory()->count(3))
            ->has(Religion::factory()->count(3))
            ->has(\App\Models\Profile\Human\Gallery::factory()->count(5))
            ->create();

        Pet::factory(15)
            ->has(\App\Models\Profile\Pet\Gallery::factory()->count(5))
            ->create();

        Community::factory(5)
            ->has(Post::factory(5)->has(\App\Models\Community\Posts\Gallery::factory(5)))
            ->has(\App\Models\Community\Gallery::factory(5))
            ->has(User::factory()->count(30))
            ->has(Human::factory(5))
            ->create();
    }

    private function createUsers(): void
    {
        User::create([
            'username' => 'Ivanov Ivan Ivanovich',
            'email' => 'svinpauk78@gmail.com',
            'password' => \Hash::make('test1234'),
        ]);

        User::create([
            'username' => 'Petrov Petr Pen',
            'email' => 'shahed@gmail.com',
            'password' => \Hash::make('test1234'),
        ]);
    }
}
