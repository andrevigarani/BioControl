<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Animal;
use App\Models\Raca;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ListAnimalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ct03_search_existing_animal()
    {
        // Cria um usuário e loga
        $user = User::factory()->create([
            'email' => 'andre@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->actingAs($user);

        // Cria um animal com nome 'tobi'
        Animal::factory()->create([
            'nome' => 'tobi',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
        ]);

        // Faz a requisição para pesquisar o animal
        $response = $this->get('/user/animais?pesquisa=tobi');

        // Verifica se o animal com nome 'tobi' está na resposta
        $response->assertStatus(200);
        $response->assertSee('tobi');
    }

    /** @test */
    public function ct04_search_non_existing_animal()
    {
        // Cria um usuário e loga
        $user = User::factory()->create([
            'email' => 'andre@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->actingAs($user);

        // Cria um animal com nome 'tobi'
        Animal::factory()->create([
            'nome' => 'tobi',
            'id_responsavel_animal' => $user->id_pessoa_fisica,
        ]);

        // Faz a requisição para pesquisar o animal inexistente
        $response = $this->get('/user/animais?pesquisa=rex');

        // Verifica se o animal com nome 'tobi' não está na resposta
        $response->assertStatus(200);
        $response->assertDontSee('tobi');
    }
}
