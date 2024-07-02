<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Animal;
use App\Models\Vacina;
use App\Models\Raca;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class CreateVacinaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ct05_valid_vaccine_registration()
    {
        // Cria um usuário e loga
        $user = User::factory()->create([
            'email' => 'andre@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->actingAs($user);

        // Cria um animal com nome 'tobi'
        $animal = Animal::factory()->create([
            'nome' => 'tobi',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
        ]);

        // Cria uma vacina
        $vacina = Vacina::factory()->create();

        // Dados para a aplicação da vacina
        $data = [
            'id_vacina' => $vacina->id,
            'data_aplicacao' => '2023-05-15',
        ];

        // Faz a requisição para cadastrar a vacina
        $response = $this->post('/user/animais/'.$animal->id.'/vacinas/store', $data);

        // Verifica se a vacina foi cadastrada corretamente
        $this->assertDatabaseHas('animal_vacinas', [
            'id_vacina' => $vacina->id,
            'data_aplicacao' => '2023-05-15',
        ]);
    }

    /** @test */
    public function ct06_vaccine_registration_without_selecting_vaccine()
    {
        // Cria um usuário e loga
        $user = User::factory()->create([
            'email' => 'andre@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->actingAs($user);

        // Cria dependências
        $raca = Raca::factory()->create();

        // Cria um animal
        $animal = Animal::factory()->create([
            'id_responsavel_animal' => $user->id_pessoa_fisica,
            'id_raca' => $raca->id,
        ]);

        // Dados para a aplicação da vacina sem selecionar vacina
        $data = [
            'id_vacina' => null,
            'data_aplicacao' => '2023-05-15',
        ];

        // Faz a requisição para cadastrar a vacina
        $response = $this->post('/user/animais/'.$animal->id.'/vacinas/store', $data);

        // Verifica se o sistema retornou um erro de validação
        $response->assertSessionHasErrors('id_vacina');
    }
}
