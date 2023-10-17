<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipio::insert([
            [
                'nome_municipios' => 'Presidente Getúlio',
                'id_estado' => 1,
            ],
            [
                'nome_municipios' => 'Ibirama',
                'id_estado' => 1,
            ],
            [
                'nome_municipios' => 'Rio do Sul',
                'id_estado' => 1,
            ],
            [
                'nome_municipios' => 'Porto Alegre',
                'id_estado' => 2,
            ],
        ]);
    }
}
