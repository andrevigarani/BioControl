<?php

namespace Tests\Unit;

use App\Models\Vacina;
use Tests\TestCase;
use Mockery;
use Illuminate\Http\Request;
use App\Http\Controllers\VacinaController;

class DeleteVacinaTest extends TestCase
{
    public function test_ct16_delete_vaccine()
    {
        // Mockando a vacina existente
        $vacinaMock = Mockery::mock(Vacina::class);
        $vacinaMock->shouldReceive('delete')->once()->andReturn(true);

        // Mockando a rota
        $vacinaMock->shouldReceive('route')->andReturn(route('user.vacinas.index'));

        // Instância do controlador
        $controller = new VacinaController();

        // Criando uma requisição mockada
        $request = Request::create('/vacinas/1', 'DELETE');

        // Chamando o método destroy do controlador
        $response = $controller->destroy($vacinaMock);

        // Verificando se o usuário foi redirecionado para a página de vacinas com a mensagem de sucesso
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('user.vacinas.index'), $response->getTargetUrl());
        $this->assertEquals('Vacina excluída com sucesso!', session('success'));
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
