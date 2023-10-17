<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rua::insert([
            [
                'nome_rua' => 'Curt Herring',
                'id_bairro' => 1,
            ],
            [
                'nome_rua' => 'Rua 7 de Setembro',
                'id_bairro' => 1,
            ],
            [
                'nome_rua' => 'Rio do Sul',
                'id_bairro' => 1,
            ],
            // Adicione mais municípios aqui, se necessário
        ]);
    }
}
