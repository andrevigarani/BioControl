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
Route::get('/ocorrencias', [OcorrenciaController::class, 'index'])->name('ocorrencias.index');

/*
 * Auth section
 */
Route::prefix('user',2)->middleware('auth')->group(function() {

    Route::get('/home', [HomeController::class, 'privateIndex'])->name('user.home');

    Route::get('/contatos', [ContatoController::class, 'privateIndex'])->name('user.contatos.index');
    Route::get('/contatos/create', [ContatoController::class, 'create'])->name('user.contatos.create');
    Route::post('/contatos/store', [ContatoController::class, 'store'])->name('user.contatos.store');
    Route::delete('/contatos/{id}', [ContatoController::class, 'destroy'])->name('user.contatos.destroy');
    Route::get('/contatos/{id}/edit', [ContatoController::class, 'edit'])->name('user.contatos.edit');
    Route::put('/contatos/update/{id}', [ContatoController::class, 'update'])->name('user.contatos.update');

    Route::get('/vacinas', [VacinaController::class, 'privateIndex'])->name('user.vacinas.index');
    Route::get('/vacinas/create', [VacinaController::class, 'create'])->name('user.vacinas.create');
    Route::post('/vacinas/store', [VacinaController::class, 'store'])->name('user.vacinas.store');
    Route::delete('/vacinas/{id}', [VacinaController::class, 'destroy'])->name('user.vacinas.destroy');
    Route::get('/vacinas/{id}/edit', [VacinaController::class, 'edit'])->name('user.vacinas.edit');
    Route::put('/vacinas/update/{id}', [VacinaController::class, 'update'])->name('user.vacinas.update');

    Route::get('/racas', [RacaController::class, 'privateIndex'])->name('user.racas.index');
    Route::get('/racas/create', [RacaController::class, 'create'])->name('user.racas.create');
    Route::post('/racas/store', [RacaController::class, 'store'])->name('user.racas.store');
    Route::delete('/racas/{id}', [RacaController::class, 'destroy'])->name('user.racas.destroy');
    Route::get('/racas/{id}/edit', [RacaController::class, 'edit'])->name('user.racas.edit');
    Route::put('/racas/update/{id}', [RacaController::class, 'update'])->name('user.racas.update');

    Route::get('/especies', [EspecieController::class, 'privateIndex'])->name('user.especies.index');
    Route::get('/especies/create', [EspecieController::class, 'create'])->name('user.especies.create');
    Route::post('/especies/store', [EspecieController::class, 'store'])->name('user.especies.store');
    Route::delete('/especies/{id}', [EspecieController::class, 'destroy'])->name('user.especies.destroy');
    Route::get('/especies/{id}/edit', [EspecieController::class, 'edit'])->name('user.especies.edit');
    Route::put('/especies/update/{id}', [EspecieController::class, 'update'])->name('user.especies.update');

    Route::get('/doencas', [DoencaController::class, 'privateIndex'])->name('user.doencas.index');
    Route::get('/doencas/create', [DoencaController::class, 'create'])->name('user.doencas.create');
    Route::post('/doencas/store', [DoencaController::class, 'store'])->name('user.doencas.store');
    Route::delete('/doencas/{id}', [DoencaController::class, 'destroy'])->name('user.doencas.destroy');
    Route::get('/doencas/{id}/edit', [DoencaController::class, 'edit'])->name('user.doencas.edit');
    Route::put('/doencas/update/{id}', [DoencaController::class, 'update'])->name('user.doencas.update');

    Route::get('/animais', [AnimalController::class, 'privateIndex'])->name('user.animais.index');
    Route::get('/animais/create', [AnimalController::class, 'create'])->name('user.animais.create');
    Route::post('/animais/store', [AnimalController::class, 'store'])->name('user.animais.store');
    Route::delete('/animais/{id}', [AnimalController::class, 'destroy'])->name('user.animais.destroy');
    Route::get('/animais/{id}/edit', [AnimalController::class, 'edit'])->name('user.animais.edit');
    Route::put('/animais/update/{id}', [AnimalController::class, 'update'])->name('user.animais.update');
    Route::get('/animais/{id}/vacinas', [AnimalController::class, 'animaisVacinas'])->name('user.animais.vacinas.index');
    Route::get('/animais/{id}/doencas', [AnimalController::class, 'animaisDoencas'])->name('user.animais.doencas.index');

});
