<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Mockery;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class LoginUserTest extends TestCase
{
    public function test_ct07_valid_login()
    {
        $requestData = [
            'email' => 'andrevigarani@example.com',
            'password' => 'SenhaForte123',
        ];

        // Mock do modelo User
        $userMock = Mockery::mock(User::class);

        // Configura o método newQuery() para retornar o próprio modelo mockado
        $userMock->shouldReceive('newQuery')->andReturnSelf();

        // Configura o método where() para simular a busca pelo usuário
        $userMock->shouldReceive('where')
            ->with('email', 'andrevigarani@example.com')
            ->andReturnSelf(); // Retorna o próprio mock para encadear métodos

        // Configura o método first() para simular a obtenção do usuário
        $userMock->shouldReceive('first')
            ->andReturn((object) [
                'name' => 'Andre Vigarani',
                'email' => 'andrevigarani@example.com',
                'password' => Hash::make('SenhaForte123'),
                'id_pessoa_fisica' => 1,
            ]);

        // Troca a instância do modelo User pelo mock na injeção de dependências
        $this->app->instance(User::class, $userMock);

        // Mock do guard
        $guardMock = Mockery::mock();
        $guardMock->shouldReceive('attempt')
            ->with([
                'email' => 'andrevigarani@example.com',
                'password' => 'SenhaForte123',
            ], false)
            ->once()
            ->andReturn(true);

        $guardMock->shouldReceive('user')
            ->once()
            ->andReturn((object) [
                'name' => 'Andre Vigarani',
                'email' => 'andrevigarani@example.com',
                'password' => Hash::make('SenhaForte123'),
                'id_pessoa_fisica' => 1,
            ]);

        // Mock da Auth facade
        Auth::shouldReceive('guard')
            ->andReturn($guardMock);

        // Instância do controlador
        $controller = new LoginController();

        // Cria um request com a sessão configurada
        $request = Request::create('/login', 'POST', $requestData);

        // Configura a sessão no request
        $request->setLaravelSession(Session::getFacadeRoot());

        // Chama o método login do controlador
        $response = $controller->login($request);

        // Verifica que o usuário foi redirecionado para a home
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('home'), $response->getTargetUrl());
    }

    public function test_ct08_failed_login()
    {
        $requestData = [
            'email' => 'andrevigarani@example.com',
            'password' => 'senhaErrada',
        ];

        // Mock do guard
        $guardMock = Mockery::mock();
        $guardMock->shouldReceive('attempt')
            ->with([
                'email' => 'andrevigarani@example.com',
                'password' => 'senhaErrada',
            ], false)
            ->once()
            ->andReturn(false);

        // Mock da Auth facade
        Auth::shouldReceive('guard')
            ->andReturn($guardMock);

        // Cria um request com a sessão configurada
        $request = Request::create('/login', 'POST', $requestData);

        // Configura a sessão no request
        $request->setLaravelSession(Session::getFacadeRoot());

        // Instância do controlador
        $controller = new LoginController();

        // Verifica que o usuário não está autenticado
        $this->expectExceptionMessage('Essas credenciais não foram encontradas em nossos registros.');

        // Chama o método login do controlador
        $controller->login($request);

        $this->assertGuest();
    }

    public function test_ct09_logout()
    {
        // Mock do guard
        $guardMock = Mockery::mock();
        $guardMock->shouldReceive('logout')
            ->once()
            ->andReturnNull();

        // Mock da Auth facade
        Auth::shouldReceive('guard')
            ->andReturn($guardMock);

        // Instância do controlador
        $controller = new LoginController();

        // Cria um request com a sessão configurada
        $request = Request::create('/logout', 'POST');

        // Configura a sessão no request
        $request->setLaravelSession(Session::getFacadeRoot());

        // Chama o método logout do controlador
        $response = $controller->logout($request);

        // Verifica que o usuário foi redirecionado para a página inicial
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(env('APP_URL'), $response->getTargetUrl());
    }

    public function test_ct10_redirect_to_login_for_unauthenticated_user()
    {
        // Envia uma solicitação GET para a rota protegida
        $response = $this->get('/user/home');

        // Verifica que o usuário foi redirecionado para a página de login
        $response->assertRedirect(route('login'));
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
