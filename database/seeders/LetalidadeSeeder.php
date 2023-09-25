<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Letalidade;

class LetalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Inserir registros na tabela "especies"
        Letalidade::insert([
            ['nome_letalidade' => 'Muito Baixa'],
            ['nome_letalidade' => 'Baixa'],
            ['nome_letalidade' => 'Moderada'],
            ['nome_letalidade' => 'Alta'],
            ['nome_letalidade' => 'Muito Alta'],
        ]);
    }
}
