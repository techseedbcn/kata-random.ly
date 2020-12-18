<?php

namespace Database\Factories;

use App\Models\Kata;
use Illuminate\Database\Eloquent\Factories\Factory;

class KataFactory extends Factory
{
    protected $model = Kata::class;

    public function definition() {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(50),
            'level' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'source' => $this->faker->lastName,
        ];
    }
}
