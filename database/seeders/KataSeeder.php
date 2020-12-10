<?php

namespace Database\Seeders;
use App\Models\Kata;

use Illuminate\Database\Seeder;

class KataSeeder extends Seeder
{
    public function run()
    {
        Kata::factory(5)->create();
    }
}
