<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especie;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Inserir registros na tabela "especies"
        Especie::insert([
            ['nome_especie' => 'Cachorro'],
            ['nome_especie' => 'Gato'],
        ]);
    }
}
