<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Religion::factory(10)->create();
        Hobby::factory(10)->create();
        Profile::factory(30)->create();
        Cemetery::factory(30)->create();

        \DB::table('users')->insert([
            'username' => 'Shahed_136',
            'email' => 'svinpauk78@gmail.com',
            'password' => \Hash::make('test1234'),
        ]);

        \DB::table('users')->insert([
            'username' => 'Shahed',
            'email' => 'shahed@gmail.com',
            'password' => \Hash::make('test1234'),
        ]);
    }
}
