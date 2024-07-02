<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EspecieFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        ];
    }
}
