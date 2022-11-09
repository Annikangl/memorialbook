<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cemetery\Cemetery;
use App\Models\Cemetery\Gallery;
use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Database\Seeders\Profile\DeathReasonSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Religion::factory(10)->create();
        Hobby::factory(10)->create();

        $this->call(DeathReasonSeeder::class);

        Cemetery::factory(30)
            ->has(Gallery::factory()->count(5))
            ->create();

        Profile::factory(30)
            ->has(Cemetery::factory()->count(3))
            ->has(Hobby::factory()->count(3))
            ->has(Religion::factory()->count(3))
            ->has(\App\Models\Profile\Gallery::factory()->count(5))

            ->create();

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
