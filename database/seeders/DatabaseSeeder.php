<?php

namespace Database\Seeders;
use Database\Seeders\KataSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(KataSeeder::class);
    }
}
