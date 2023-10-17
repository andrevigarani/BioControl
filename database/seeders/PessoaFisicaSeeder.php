<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PessoaFisicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $pessoaFisica1 = PessoaFisica::create([
            'nome' => 'Ricardo Augusto dos Santos Wegner',
            'cpf' => '00055500055',
            'data_nascimento' => '1996-03-11',
            'rg' => '5550005',
            'naturalidade' => 'Brasileiro',
            'telefone' => '47999559955',
            'whatsapp' => '47999559955',
            'email' => 'ricardoaugustowegner@gmail.com',
            'numero_endereco' => '5',
            'cep' => '89150000',
            'complemento' => 'Casa',
            'id_estado' => '1',
            'id_municipio' => '1',
            'id_bairro' => '1',
            'id_rua' => '2',

        ]);

        $pessoaFisica2 = PessoaFisica::create([
            'nome' => 'Ricardo Augusto dos Santos Wegner',
            'cpf' => '11155511155',
            'data_nascimento' => '2000-07-05',
            'rg' => '5550005',
            'naturalidade' => 'Brasileiro',
            'telefone' => '47944559944',
            'whatsapp' => '47944559944',
            'email' => 'andrevigarani@gmail.com',
            'numero_endereco' => '3',
            'cep' => '89150000',
            'complemento' => 'Casa',
            'id_estado' => '1',
            'id_municipio' => '1',
            'id_bairro' => '1',
            'id_rua' => '1',
        ]);

        $pessoaFisica3 = PessoaFisica::create([
            'nome' => 'Carlao Udesc',
            'cpf' => '22266611122',
            'data_nascimento' => '1970-08-21',
            'rg' => '5550005',
            'naturalidade' => 'Brasileiro',
            'telefone' => '47999111111',
            'whatsapp' => '47999111111',
            'email' => 'carlaoudesc@gmail.com',
            'numero_endereco' => '3',
            'cep' => '89150000',
            'complemento' => 'Casa',
            'id_estado' => '1',
            'id_municipio' => '1',
            'id_bairro' => '1',
            'id_rua' => '3',
        ]);

        $pessoaFisica4 = PessoaFisica::create([
            'nome' => 'João da Silva',
            'cpf' => '77766611122',
            'data_nascimento' => '1977-09-25',
            'rg' => '2250005',
            'naturalidade' => 'Brasileiro',
            'telefone' => '47966611111',
            'whatsapp' => '47966611111',
            'email' => 'joaosilva@gmail.com',
            'numero_endereco' => '8',
            'cep' => '89150000',
            'complemento' => 'Casa',
            'id_estado' => '1',
            'id_municipio' => '1',
            'id_bairro' => '1',
            'id_rua' => '1',
        ]);

        $pessoaFisica5 = PessoaFisica::create([
            'nome' => 'Maria Souza',
            'cpf' => '88866611122',
            'data_nascimento' => '1988-11-12',
            'rg' => '2850005',
            'naturalidade' => 'Brasileiro',
            'telefone' => '47988811111',
            'whatsapp' => '47988811111',
            'email' => 'mariasouza@gmail.com',
            'numero_endereco' => '7',
            'cep' => '89150000',
            'complemento' => 'Casa',
            'id_estado' => '1',
            'id_municipio' => '1',
            'id_bairro' => '1',
            'id_rua' => '1',
        ]);
        

        // Associar as pessoas físicas e jurídicas à tabela pessoas usando o relacionamento polimórfico
        $pessoaFisica1->pessoa()->create(['nome' => 'João', 'email' => 'joao@example.com']);
        $pessoaFisica2->pessoa()->create(['nome' => 'Maria', 'email' => 'maria@example.com']);
        
    }
    }
}
