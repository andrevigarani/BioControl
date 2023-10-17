<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PessoaJuridicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar duas pessoas jurídicas
        $pessoaJuridica1 = PessoaJuridica::create([
            'razao_social' => 'Minha Empresa 1',
            'nome_fantasia' => 'Empresa Fantasia 1',
            'cnpj' => '12345678901234',
            'ie' => 'ABCDE',
            'telefone' => '987654321',
            'whatsapp' => '123456789',
        ]);

        $pessoaJuridica2 = PessoaJuridica::create([
            'razao_social' => 'Minha Empresa 2',
            'nome_fantasia' => 'Empresa Fantasia 2',
            'cnpj' => '98765432109876',
            'ie' => 'FGHIJ',
            'telefone' => '987654321',
            'whatsapp' => '123456789',
        ]);

        $pessoaJuridica1->pessoa()->create(['nome' => 'Minha Empresa 1', 'email' => 'empresa1@example.com']);
        $pessoaJuridica2->pessoa()->create(['nome' => 'Minha Empresa 2', 'email' => 'empresa2@example.com']);
    }
}
