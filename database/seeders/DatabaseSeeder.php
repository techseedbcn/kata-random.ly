<?php

namespace Database\Seeders;
use Database\Seeders\KataSeeder;
use Database\Seeders\SkillSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(KataSeeder::class);
        $this->call(SkillSeeder::class);
    }
}
