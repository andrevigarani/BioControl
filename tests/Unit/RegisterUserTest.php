<?php

namespace Tests\Unit;

use App\Models\PessoaFisica;
use Tests\TestCase;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Mockery;

class RegisterUserTest extends TestCase
{
    public function test_ct01_valid_user_registration()
    {
        Mockery::close();
        $requestData = [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => 'SenhaForte123',
            'password_confirmation' => 'SenhaForte123',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ];

        // Mock do modelo PessoaFisica
        $pessoaFisicaMock = Mockery::mock('overload:' . PessoaFisica::class);
        $pessoaFisicaMock->shouldReceive('create')->once()->andReturn((object) [
            'id' => 1,
            'nome' => 'Andre Vigarani',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ]);

        // Mock do modelo User
        $userMock = Mockery::mock('overload:' . User::class);
        $userMock->shouldReceive('create')->once()->andReturn((object) [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => Hash::make('SenhaForte123'),
            'id_pessoa_fisica' => 1,
        ]);

        // Instância do controlador
        $controller = new RegisterController();

        // Usando reflexão para acessar o método protegido 'create'
        $reflection = new \ReflectionClass($controller);
        $method = $reflection->getMethod('create');
        $method->setAccessible(true);

        // Chamando o método protegido 'create'
        $response = $method->invoke($controller, $requestData);

        // Verificar se a resposta contém os dados esperados
        $this->assertEquals('Andre Vigarani', $response->name);
        $this->assertEquals('andrevigarani@example.com', $response->email);
        $this->assertTrue(Hash::check('SenhaForte123', $response->password));
        $this->assertEquals(1, $response->id_pessoa_fisica);
    }

    public function test_ct02_password_too_short()
    {
        $requestData = [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => 'Senha',
            'password_confirmation' => 'Senha',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ];

        // Instância do controlador
        $controller = new RegisterController();

        // Usando reflexão para acessar o método protegido 'create'
        $reflection = new \ReflectionClass($controller);
        $method = $reflection->getMethod('validator');
        $method->setAccessible(true);

        // Chamando o método protegido 'create'
        $response = $method->invoke($controller, $requestData);

        // Verificar se o método retornou uma mensagem de erro esperada
        $this->assertTrue($response->fails());
        $this->assertEquals('O campo senha deve ter pelo menos 8 caracteres.', $response->errors()->first('password'));
    }

    public function test_ct03_password_too_long()
    {
        $requestData = [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => 'senha12345678901112131415161718192021222324252623',
            'password_confirmation' => 'senha12345678901112131415161718192021222324252623',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ];

        // Instância do controlador
        $controller = new RegisterController();

        // Usando reflexão para acessar o método protegido 'create'
        $reflection = new \ReflectionClass($controller);
        $method = $reflection->getMethod('validator');
        $method->setAccessible(true);

        // Chamando o método protegido 'create'
        $response = $method->invoke($controller, $requestData);

        // Verificar se o método retornou uma mensagem de erro esperada
        $this->assertTrue($response->fails());
        $this->assertEquals('O campo senha não pode ser superior a 30 caracteres.', $response->errors()->first('password'));
    }

    public function test_ct04_valid_password_length()
    {
        $requestData = [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => 'senha12345678901112131415161718',
            'password_confirmation' => 'senha12345678901112131415161718',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ];

        // Mock do modelo PessoaFisica
        $pessoaFisicaMock = Mockery::mock('overload:' . PessoaFisica::class);
        $pessoaFisicaMock->shouldReceive('create')->once()->andReturn((object) [
            'id' => 1,
            'nome' => 'Andre Vigarani',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ]);

        // Mock do modelo User
        $userMock = Mockery::mock('overload:' . User::class);
        $userMock->shouldReceive('create')->once()->andReturn((object) [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => Hash::make('senha12345678901112131415161718'),
            'id_pessoa_fisica' => 1,
        ]);

        // Instância do controlador
        $controller = new RegisterController();

        // Usando reflexão para acessar o método protegido 'create'
        $reflection = new \ReflectionClass($controller);
        $method = $reflection->getMethod('create');
        $method->setAccessible(true);

        // Chamando o método protegido 'create'
        $response = $method->invoke($controller, $requestData);

        // Verificar se a resposta contém os dados esperados
        $this->assertEquals('Andre Vigarani', $response->name);
        $this->assertEquals('andrevigarani@example.com', $response->email);
        $this->assertTrue(Hash::check('senha12345678901112131415161718', $response->password));
        $this->assertEquals(1, $response->id_pessoa_fisica);
    }

    public function test_ct05_password_minimum_length()
    {
        $requestData = [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => '12345978',
            'password_confirmation' => '12345978',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ];

        // Mock do modelo PessoaFisica
        $pessoaFisicaMock = Mockery::mock('overload:' . PessoaFisica::class);
        $pessoaFisicaMock->shouldReceive('create')->once()->andReturn((object) [
            'id' => 1,
            'nome' => 'Andre Vigarani',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ]);

        // Mock do modelo User
        $userMock = Mockery::mock('overload:' . User::class);
        $userMock->shouldReceive('create')->once()->andReturn((object) [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => Hash::make('12345978'),
            'id_pessoa_fisica' => 1,
        ]);

        // Instância do controlador
        $controller = new RegisterController();

        // Usando reflexão para acessar o método protegido 'create'
        $reflection = new \ReflectionClass($controller);
        $method = $reflection->getMethod('create');
        $method->setAccessible(true);

        // Chamando o método protegido 'create'
        $response = $method->invoke($controller, $requestData);

        // Verificar se a resposta contém os dados esperados
        $this->assertEquals('Andre Vigarani', $response->name);
        $this->assertEquals('andrevigarani@example.com', $response->email);
        $this->assertTrue(Hash::check('12345978', $response->password));
        $this->assertEquals(1, $response->id_pessoa_fisica);
    }

    public function test_ct06_password_confirmation_mismatch()
    {
        $requestData = [
            'name' => 'Andre Vigarani',
            'email' => 'andrevigarani@example.com',
            'password' => '12345678',
            'password_confirmation' => '123456789',
            'nascimento' => '2003-02-05',
            'cpf' => '54420608013',
        ];

        // Instância do controlador
        $controller = new RegisterController();

        // Usando reflexão para acessar o método protegido 'create'
        $reflection = new \ReflectionClass($controller);
        $method = $reflection->getMethod('validator');
        $method->setAccessible(true);

        // Chamando o método protegido 'create'
        $response = $method->invoke($controller, $requestData);

        // Verificar se o método retornou uma mensagem de erro esperada
        $this->assertTrue($response->fails());
        $this->assertEquals('O campo senha de confirmação não confere.', $response->errors()->first('password'));
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
