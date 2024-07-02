<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CreateOcorrenciaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ct07_valid_occurrence_registration()
    {
        // Dados para o cadastro da ocorrência
        $data = [
            'titulo' => 'Ocorrência de Teste',
            'tipo' => 'D',
            'endereco' => 'Rua Exemplo, 123',
            'descricao' => 'Denúncia de exemplo apenas para o plano de testes',
        ];

        // Faz a requisição para cadastrar a ocorrência
        $response = $this->post('/ocorrencias/store', $data);

        // Verifica se a ocorrência foi cadastrada corretamente
        $this->assertDatabaseHas('ocorrencias', [
            'titulo' => 'Ocorrência de Teste',
            'tipo' => 'D',
            'descricao' => 'Denúncia de exemplo apenas para o plano de testes',
            'endereco' => 'Rua Exemplo, 123',
        ]);
        $this->assertTrue(Session::has('success'));
    }

    /** @test */
    public function ct08_invalid_occurrence_registration()
    {
        // Dados para o cadastro da ocorrência com campos faltantes
        $data = [
            'titulo' => '',
            'tipo' => '',
            'descricao' => '',
            'endereco' => '',
        ];

        // Faz a requisição para cadastrar a ocorrência
        $response = $this->post('/ocorrencias/store', $data);

        // Verifica se o sistema retornou um erro de validação
        $response->assertSessionHasErrors([
            'titulo' => 'O campo titulo é obrigatório.',
            'tipo' => 'O campo tipo é obrigatório.',
            'descricao' => 'O campo descricao é obrigatório.',
            'endereco' => 'O campo endereco é obrigatório.',
        ]);
    }
}
