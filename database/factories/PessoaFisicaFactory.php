<?php

namespace Database\Factories;

use App\Models\PessoaFisica;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFisicaFactory extends Factory
{
    protected $model = PessoaFisica::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'nascimento' => $this->faker->date('Y-m-d', '2000-01-01'),
        ];
    }
}
