<?php

namespace Database\Seeders\Profile;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeathReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = ['рак', 'инсульт', 'несчастный случай', 'болезнь легких', 'болезнь Альцгеймера', 'сахарный диабет'];

        foreach ($reasons as $reason) {
            DB::table('death_reasons')->insert(['title' => $reason]);
        }
    }
}
