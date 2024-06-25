<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Vacina;
use Tests\TestCase;
use Mockery;
use Illuminate\Http\Request;
use App\Http\Controllers\VacinaController;
use Illuminate\Support\Facades\Auth;

class EditVacinaTest extends TestCase
{
    public function test_ct15_edit_vaccine()
    {
        // Mockando o usuário logado
        $userMock = Mockery::mock(User::class);
        $userMock->shouldReceive('getAttribute')->with('id')->andReturn(1);
        $this->actingAs($userMock);

        // Mockando a vacina existente
        $vacinaMock = Mockery::mock(Vacina::class)->makePartial();
        $vacinaMock->shouldReceive('findOrFail')->with(1)->andReturnSelf();
        $vacinaMock->shouldReceive('update')->with([
            'nome' => 'vacina 2',
            'descricao' => 'vacina para gripe',
            'periodo' => '1 ano',
        ])->andReturn(true);

        // Substituindo o modelo Vacina pelo mock
        $this->app->instance(Vacina::class, $vacinaMock);

        // Criando o request com os dados da vacina
        $request = Request::create('/vacinas/1', 'PUT', [
            'nome' => 'vacina 2',
            'descricao' => 'vacina para gripe',
            'periodo' => '1 ano',
        ]);

        // Instância do controlador
        $controller = new VacinaController();

        // Chamando o método update do controlador
        $response = $controller->update($request, $vacinaMock);

        // Verificando se o usuário foi redirecionado para a página de vacinas com a mensagem de sucesso
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('user.vacinas.index'), $response->getTargetUrl());
        $this->assertEquals('Vacina atualizada com sucesso!', session('success'));
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
