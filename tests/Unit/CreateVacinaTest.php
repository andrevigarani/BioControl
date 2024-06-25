<?php

namespace Tests\Unit;

use App\Http\Controllers\VacinaController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CreateVacinaTest extends TestCase
{
    public function test_ct11_valid_vaccine_creation()
    {
        $requestData = [
            'nome' => 'vacina 1',
            'descricao' => 'vacina da gripe',
            'periodo' => '1 ano',
        ];

        // Mockando a requisição
        $request = new Request($requestData);

        // Criando uma instância do controlador
        $controller = new VacinaController();

        // Chamando o método store
        $response = $controller->store($request);

        // Verifica o redirecionamento para a rota index no sucesso
        $this->assertEquals(route('user.vacinas.index'), $response->getTargetUrl());

        // Verifica se a sessão contém a mensagem de sucesso
        $this->assertTrue(Session::has('success'));
    }

    public function test_ct12_blank_name()
    {
        $requestData = [
            'nome' => '', // Nome em branco
            'descricao' => 'vacina da gripe',
            'periodo' => '1 ano',
        ];

        // Mockando a requisição
        $request = new Request($requestData);

        // Criando uma instância do controlador
        $controller = new VacinaController();

        // Verifica o erro
        $this->expectExceptionMessage('O campo nome é obrigatório.');

        // Chamando o método store
        $response = $controller->store($request);

        // Verifica o redirecionamento de volta no erro
        $this->assertEquals(route('user.vacinas.create'), $response->getTargetUrl());

        // Verifica se a sessão contém a mensagem de erro
        $this->assertTrue(Session::has('error'));
    }

    public function test_ct13_blank_description()
    {
        $requestData = [
            'nome' => 'vacina 1',
            'descricao' => '', // Descrição em branco
            'periodo' => '1 ano',
        ];

        // Mockando a requisição
        $request = new Request($requestData);

        // Criando uma instância do controlador
        $controller = new VacinaController();

        // Verifica o erro
        $this->expectExceptionMessage('O campo descricao é obrigatório.');

        // Chamando o método store
        $response = $controller->store($request);

        // Verifica o redirecionamento de volta no erro
        $this->assertEquals(route('user.vacinas.create'), $response->getTargetUrl());

        // Verifica se a sessão contém a mensagem de erro
        $this->assertTrue(Session::has('error'));
    }

    public function test_ct14_blank_period()
    {
        $requestData = [
            'nome' => 'vacina 1',
            'descricao' => 'vacina para gripe',
            'periodo' => '', // Período em branco
        ];

        // Mockando a requisição
        $request = new Request($requestData);

        // Criando uma instância do controlador
        $controller = new VacinaController();

        // Verifica o erro
        $this->expectExceptionMessage('O campo periodo é obrigatório.');

        // Chamando o método store
        $response = $controller->store($request);

        // Verifica o redirecionamento de volta no erro
        $this->assertEquals(route('user.vacinas.create'), $response->getTargetUrl());

        // Verifica se a sessão contém a mensagem de erro
        $this->assertTrue(Session::has('error'));
    }
}
