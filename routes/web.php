<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\HomeController;


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
Route::get('/adocoes', [App\Http\Controllers\HomeController::class, 'index'])->name('adocoes.index');
Route::get('/dados', [App\Http\Controllers\HomeController::class, 'index'])->name('dados.index');
Route::get('/logisticaReversa', [App\Http\Controllers\HomeController::class, 'index'])->name('logisticaReversa.index');
Route::get('/ocorrencias', [App\Http\Controllers\HomeController::class, 'index'])->name('ocorrencias.index');

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

    Route::get('/vacinas', [VacinaController::class, 'index'])->name('user.vacinas.index');
    Route::get('user/vacinas/create', [VacinaController::class, 'create'])->name('user.vacinas.create');
    Route::post('user/vacinas/store', [VacinaController::class, 'store'])->name('user.vacinas.store');
    Route::delete('user/vacinas/{vacina}', [VacinaController::class, 'destroy'])->name('user.vacinas.destroy');
    Route::get('user/vacinas/{vacina}/edit', [VacinaController::class, 'edit'])->name('user.vacinas.edit');
    Route::put('/user/vacinas/update/{vacina}', [VacinaController::class, 'update'])->name('user.vacinas.update');

    Route::get('/especies', [App\Http\Controllers\EspecieController::class, 'index'])->name('user.especies.index');
    Route::get('/racas', [App\Http\Controllers\RacaController::class, 'index'])->name('user.racas.index');

});
