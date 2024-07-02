<?php

namespace Database\Factories;

use App\Models\Raca;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'nascimento' => $this->faker->date,
            'id_responsavel_animal' => User::factory(),
            'id_raca' => Raca::factory(),
        ];
    }
}
