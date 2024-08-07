<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\DoencaController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\DadoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LogisticaReversaController;
use App\Http\Controllers\AnimalVacinaController;
use App\Http\Controllers\AnimalDoencaController;
use App\Http\Controllers\ClinicaVeterinariaController;
use App\Http\Controllers\AbrigoController;
use App\Http\Controllers\PessoaJuridicaController;
use App\Http\Controllers\DicaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['reset' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contatos', [ContatoController::class, 'index'])->name('contatos.index');
Route::get('/adocoes', [AnimalController::class, 'adocaoIndex'])->name('adocoes.index');
Route::get('/dados', [DadoController::class, 'index'])->name('dados.index');
Route::get('/logisticaReversa', [LogisticaReversaController::class, 'index'])->name('logisticaReversa.index');

Route::get('/ocorrencias', [OcorrenciaController::class, 'create'])->name('ocorrencias.create');
Route::post('/ocorrencias/store', [OcorrenciaController::class, 'store'])->name('ocorrencias.store');

/*
 * Auth section
 */
Route::prefix('user',2)->middleware('auth')->group(function() {

    Route::get('/home', [HomeController::class, 'privateIndex'])->name('user.home');

    Route::get('/contatos', [ContatoController::class, 'privateIndex'])->name('user.contatos.index');
    Route::get('/contatos/create', [ContatoController::class, 'create'])->name('user.contatos.create');
    Route::post('/contatos/store', [ContatoController::class, 'store'])->name('user.contatos.store');
    Route::delete('/contatos/{contato}', [ContatoController::class, 'destroy'])->name('user.contatos.destroy');
    Route::get('/contatos/{contato}/edit', [ContatoController::class, 'edit'])->name('user.contatos.edit');
    Route::put('/contatos/update/{contato}', [ContatoController::class, 'update'])->name('user.contatos.update');

    Route::get('/vacinas', [VacinaController::class, 'privateIndex'])->name('user.vacinas.index');
    Route::get('/vacinas/create', [VacinaController::class, 'create'])->name('user.vacinas.create');
    Route::post('/vacinas/store', [VacinaController::class, 'store'])->name('user.vacinas.store');
    Route::delete('/vacinas/{vacina}', [VacinaController::class, 'destroy'])->name('user.vacinas.destroy');
    Route::get('/vacinas/{vacina}/edit', [VacinaController::class, 'edit'])->name('user.vacinas.edit');
    Route::put('/vacinas/update/{vacina}', [VacinaController::class, 'update'])->name('user.vacinas.update');

    Route::get('/racas', [RacaController::class, 'privateIndex'])->name('user.racas.index');
    Route::get('/racas/create', [RacaController::class, 'create'])->name('user.racas.create');
    Route::post('/racas/store', [RacaController::class, 'store'])->name('user.racas.store');
    Route::delete('/racas/{raca}', [RacaController::class, 'destroy'])->name('user.racas.destroy');
    Route::get('/racas/{raca}/edit', [RacaController::class, 'edit'])->name('user.racas.edit');
    Route::put('/racas/update/{raca}', [RacaController::class, 'update'])->name('user.racas.update');

    Route::get('/especies', [EspecieController::class, 'privateIndex'])->name('user.especies.index');
    Route::get('/especies/create', [EspecieController::class, 'create'])->name('user.especies.create');
    Route::post('/especies/store', [EspecieController::class, 'store'])->name('user.especies.store');
    Route::delete('/especies/{especie}', [EspecieController::class, 'destroy'])->name('user.especies.destroy');
    Route::get('/especies/{especie}/edit', [EspecieController::class, 'edit'])->name('user.especies.edit');
    Route::put('/especies/update/{especie}', [EspecieController::class, 'update'])->name('user.especies.update');

    Route::get('/doencas', [DoencaController::class, 'privateIndex'])->name('user.doencas.index');
    Route::get('/doencas/create', [DoencaController::class, 'create'])->name('user.doencas.create');
    Route::post('/doencas/store', [DoencaController::class, 'store'])->name('user.doencas.store');
    Route::delete('/doencas/{doenca}', [DoencaController::class, 'destroy'])->name('user.doencas.destroy');
    Route::get('/doencas/{doenca}/edit', [DoencaController::class, 'edit'])->name('user.doencas.edit');
    Route::put('/doencas/update/{doenca}', [DoencaController::class, 'update'])->name('user.doencas.update');

    Route::get('/animais', [AnimalController::class, 'privateIndex'])->name('user.animais.index');
    Route::get('/animais/create', [AnimalController::class, 'create'])->name('user.animais.create');
    Route::post('/animais/store', [AnimalController::class, 'store'])->name('user.animais.store');
    Route::delete('/animais/{animal}', [AnimalController::class, 'destroy'])->name('user.animais.destroy');
    Route::get('/animais/{animal}/edit', [AnimalController::class, 'edit'])->name('user.animais.edit');
    Route::put('/animais/update/{animal}', [AnimalController::class, 'update'])->name('user.animais.update');

    Route::get('/animais/{animal}/vacinas', [AnimalVacinaController::class, 'privateIndex'])->name('user.animais.vacinas.index');
    Route::get('/animais/{animal}/vacinas/create', [AnimalVacinaController::class, 'create'])->name('user.animais.vacinas.create');
    Route::post('/animais/{animal}/vacinas/store', [AnimalVacinaController::class, 'store'])->name('user.animais.vacinas.store');
    Route::delete('/animais/{animal}/vacinas/{animal_vacina}', [AnimalVacinaController::class, 'destroy'])->name('user.animais.vacinas.destroy');
    Route::get('/animais/{animal}/vacinas/{animal_vacina}/edit', [AnimalVacinaController::class, 'edit'])->name('user.animais.vacinas.edit');
    Route::put('/animais/{animal}/vacinas/update/{animal_vacina}', [AnimalVacinaController::class, 'update'])->name('user.animais.vacinas.update');

    Route::get('/animais/{animal}/doencas', [AnimalDoencaController::class, 'privateIndex'])->name('user.animais.doencas.index');
    Route::get('/animais/{animal}/doencas/create', [AnimalDoencaController::class, 'create'])->name('user.animais.doencas.create');
    Route::post('/animais/{animal}/doencas/store', [AnimalDoencaController::class, 'store'])->name('user.animais.doencas.store');
    Route::delete('/animais/{animal}/doencas/{animal_doenca}', [AnimalDoencaController::class, 'destroy'])->name('user.animais.doencas.destroy');
    Route::get('/animais/{animal}/doencas/{animal_doenca}/edit', [AnimalDoencaController::class, 'edit'])->name('user.animais.doencas.edit');
    Route::put('/animais/{animal}/doencas/update/{animal_doenca}', [AnimalDoencaController::class, 'update'])->name('user.animais.doencas.update');

    Route::get('/abrigos', [AbrigoController::class, 'index'])->name('user.abrigos.index');
    Route::get('/abrigos/create', [AbrigoController::class, 'create'])->name('user.abrigos.create');
    Route::post('/abrigos/store', [AbrigoController::class, 'store'])->name('user.abrigos.store');
    Route::delete('/abrigos/{id}', [AbrigoController::class, 'destroy'])->name('user.abrigos.destroy');
    Route::get('/abrigos/{id}/edit', [AbrigoController::class, 'edit'])->name('user.abrigos.edit');
    Route::put('/abrigos/update/{id}', [AbrigoController::class, 'update'])->name('user.abrigos.update');

    Route::get('/clinicaveterinaria', [ClinicaVeterinariaController::class, 'index'])->name('user.clinicasVeterinarias.index');
    Route::get('/clinicaveterinaria/create', [ClinicaVeterinariaController::class, 'create'])->name('user.clinicasVeterinarias.create');
    Route::post('/clinicaveterinaria/store', [ClinicaVeterinariaController::class, 'store'])->name('user.clinicasVeterinarias.store');
    Route::delete('/clinicaveterinaria/{id}', [ClinicaVeterinariaController::class, 'destroy'])->name('user.clinicasVeterinarias.destroy');
    Route::get('/clinicaveterinaria/{id}/edit', [ClinicaVeterinariaController::class, 'edit'])->name('user.clinicasVeterinarias.edit');
    Route::put('/clinicaveterinaria/update/{id}', [ClinicaVeterinariaController::class, 'update'])->name('user.clinicasVeterinarias.update');

    Route::get('/pessoajuridica', [PessoaJuridicaController::class, 'index'])->name('user.pessoa_juridicas.index');
    Route::get('/pessoajuridica/create', [PessoaJuridicaController::class, 'create'])->name('user.pessoa_juridicas.create');
    Route::post('/pessoajuridica/store', [PessoaJuridicaController::class, 'store'])->name('user.pessoa_juridicas.store');
    Route::delete('/pessoajuridica/{id}', [PessoaJuridicaController::class, 'destroy'])->name('user.pessoa_juridicas.destroy');
    Route::get('/pessoajuridica/{id}/edit', [PessoaJuridicaController::class, 'edit'])->name('user.pessoa_juridicas.edit');
    Route::put('/pessoajuridica/update/{id}', [PessoaJuridicaController::class, 'update'])->name('user.pessoa_juridicas.update');

    Route::get('/dicas', [DicaController::class, 'privateIndex'])->name('user.dicas.index');
    Route::get('/dicas/create', [DicaController::class, 'create'])->name('user.dicas.create');
    Route::post('/dicas/store', [DicaController::class, 'store'])->name('user.dicas.store');
    Route::delete('/dicas/{id}', [DicaController::class, 'destroy'])->name('user.dicas.destroy');
    Route::get('/dicas/{id}/edit', [DicaController::class, 'edit'])->name('user.dicas.edit');
    Route::put('/dicas/update/{id}', [DicaController::class, 'update'])->name('user.dicas.update');

});
