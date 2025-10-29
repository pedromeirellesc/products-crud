<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->word(30),
            'descricao' => fake()->word(60),
        ];
    }
}
