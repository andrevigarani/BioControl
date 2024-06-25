<?php

namespace Tests\Feature;

use App\Http\Controllers\AnimalController;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateAnimalTest extends TestCase
{
    use RefreshDatabase; // Para garantir um banco de dados limpo para cada teste

    public function test_ct01_valid_animal_registration()
    {
        // Criar um usuário mockado
        $user = $this->mock(User::class);
        $user->shouldReceive('id')->andReturn(1);
        $user->email = 'andre@example.com';
        $user->password = Hash::make('123456789');

        // Simular login do usuário
        $this->mockAuthenticatedUser($user);

        // Dados do animal para cadastro
        $animalData = [
            'nome' => 'tobi',
            'nascimento' => '2015-04-06',
        ];

        // Mock do método create no AnimalController
        $this->mock(AnimalController::class, function ($mock) use ($animalData) {
            $mock->shouldReceive('create')->once()->andReturn(Animal::create($animalData));
        });

        // Requisição para cadastrar o animal
        $response = $this->post(route('animal.store'), $animalData);

        // Verificar se o animal foi criado corretamente
        $response->assertSessionHas('success', 'Animal cadastrado com sucesso!');
        $this->assertDatabaseHas('animals', $animalData);
    }

    public function test_ct02_null_value_in_animal_registration()
    {
        // Criar um usuário mockado
        $user = $this->mock(User::class);
        $user->shouldReceive('id')->andReturn(1);
        $user->email = 'andre@example.com';
        $user->password = Hash::make('123456789');

        // Simular login do usuário
        $this->actingAs($user);

        // Dados do animal para cadastro com nome nulo
        $animalData = [
            'nome' => '', // Nome nulo
            'nascimento' => '2015-04-06',
        ];

        // Mock do método create no AnimalController
        $this->mockAnimalController($animalData);

        $this->mock(AnimalController::class, function ($mock) use ($animalData) {
            $mock->shouldReceive('create')->once()->andReturn(Animal::create($animalData));
        });

        // Requisição para cadastrar o animal
        $response = $this->post(route('animal.store'), $animalData);

        // Verificar se houve erro de validação esperado
        $response->assertSessionHasErrors(['nome']);

        // Verificar se o animal não foi cadastrado
        $this->assertDatabaseMissing('animals', $animalData);
    }

    private function mockAnimalController($animalData)
    {
        $this->mock(\App\Http\Controllers\AnimalController::class, function ($mock) use ($animalData) {
            $mock->shouldReceive('create')->once()->andReturn(Animal::create($animalData));
        });
    }
}
