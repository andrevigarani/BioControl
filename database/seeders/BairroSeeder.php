<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bairro;

class BairroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bairro::insert([
            [
                'nome_bairro' => 'Centro',
                'id_municipio' => 1,
            ],
            [
                'nome_bairro' => 'Pinheiro',
                'id_municipio' => 1,
            ],
            [
                'nome_bairro' => 'Revolver',
                'id_municipio' => 1,
            ],
            [
                'nome_bairro' => 'Mirador',
                'id_estado' => 1,
            ],
            // Adicione mais municípios aqui, se necessário
        ]);
    }
}
