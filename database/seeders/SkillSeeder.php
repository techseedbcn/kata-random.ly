<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run()
    {
        \DB::table('skills')->insert([
            ['name' => 'Algorithms & Data Structures'],
            ['name' => 'Software Architecture'],
            ['name' => 'Refactoring'],
            ['name' => 'Object-oriented Design'],
            ['name' => 'Design Patterns'],
            ['name' => 'Iterating a code base'],
        ]);
    }
}
