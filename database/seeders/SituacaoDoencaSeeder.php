<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SituacaoDoenca;

class SituacaoDoencaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Inserir registros na tabela "especies"
        SituacaoDoenca::insert([
            ['nome_situacao_doenca' => 'Erradicada'],
            ['nome_situacao_doenca' => 'Leve'],
            ['nome_situacao_doenca' => 'Moderada'],
            ['nome_situacao_doenca' => 'Significativa'],
            ['nome_situacao_doenca' => 'Grave'],
            ['nome_situacao_doenca' => 'Crítica'],
            ['nome_situacao_doenca' => 'Extremamente Crítica'],
            ['nome_situacao_doenca' => 'Catastrófica'],
        ]);
    }
}