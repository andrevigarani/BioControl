<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::insert([
            ['nome_estado' => 'Santa Catarina'],
            ['nome_estado' => 'Rio Grande do Sul'],
            ['nome_estado' => 'Paraná'],
            ['nome_estado' => 'São Paulo'],
        ]);
    }
}
