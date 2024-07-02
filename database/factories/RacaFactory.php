<?php

namespace Database\Factories;

use App\Models\Especie;
use Illuminate\Database\Eloquent\Factories\Factory;

class RacaFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'id_especie' => Especie::factory(),
        ];
    }
}
