<?php

namespace Tests\Feature;

use App\Models\Raca;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class CreateAnimalTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Se necessário, configure quaisquer pré-condições adicionais aqui
    }

    /** @test */
    public function ct01_valid_animal_registration()
    {
        // Cria um usuário e loga
        $user = User::factory()->create([
            'email' => 'andre@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->actingAs($user);

        $raca = Raca::factory()->create();

        // Dados para cadastro do animal
        $animalData = [
            'nome' => 'tobi',
            'nascimento' => '2015-04-06',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
            'id_raca' => $raca->id,
        ];

        // Faz a requisição para criar o animal
        $response = $this->post('/user/animais/store', $animalData);

        // Verifica se o animal foi registrado corretamente
        $response->assertStatus(302); // Redirecionado após sucesso
        $this->assertDatabaseHas('animais', [
            'nome' => 'tobi',
            'nascimento' => '2015-04-06',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
        ]);
    }

    /** @test */
    public function ct02_invalid_animal_registration_missing_name()
    {
        // Cria um usuário e loga
        $user = User::factory()->create([
            'email' => 'andre@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->actingAs($user);

        $raca = Raca::factory()->create();

        // Dados para cadastro do animal sem o nome
        $animalData = [
            'nome' => '',
            'nascimento' => '2015-04-06',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
            'id_raca' => $raca->id,
        ];

        // Faz a requisição para criar o animal
        $response = $this->post('/user/animais/store', $animalData);

        // Verifica se o sistema retorna erro de validação
        $response->assertSessionHasErrors('nome');
        $this->assertDatabaseMissing('animais', [
            'nascimento' => '2015-04-06',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
        ]);
    }
}
