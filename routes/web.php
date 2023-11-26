<?php
//namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\RuaController;
use App\Http\Controllers\VacinaController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user',2)->middleware('auth')->group(function() {

    Route::get('/home', [App\Http\Controllers\DoencaController::class, 'index'])->name('user.home');

    Route::get('/contactos', [App\Http\Controllers\DoencaController::class, 'index'])->name('contatos.index');
    Route::get('/contacctos', [App\Http\Controllers\DoencaController::class, 'index'])->name('user.conttos.index');

    Route::get('/contatos', [App\Http\Controllers\ContatoController::class, 'index'])->name('user.contatos.index');
    Route::get('user/contatos/create', [App\Http\Controllers\ContatoController::class, 'create'])->name('user.contatos.create');
    Route::post('user/contatos/store', [App\Http\Controllers\ContatoController::class, 'store'])->name('user.contatos.store');
    Route::delete('user/contatos/{contato}', [ContatoController::class, 'destroy'])->name('user.contatos.destroy');
    Route::get('user/contatos/{contato}/edit', [App\Http\Controllers\ContatoController::class, 'edit'])->name('user.contatos.edit');
    Route::put('/user/contatos/update/{contato}', [ContatoController::class, 'update'])->name('user.contatos.update');
    
    Route::get('/vacinas', [App\Http\Controllers\VacinaController::class, 'index'])->name('user.vacinas.index');
    Route::get('user/vacinas/create', [App\Http\Controllers\VacinaController::class, 'create'])->name('user.vacinas.create');
    Route::post('user/vacinas/store', [App\Http\Controllers\VacinaController::class, 'store'])->name('user.vacinas.store');
    Route::delete('user/vacinas/{vacina}', [VacinaController::class, 'destroy'])->name('user.vacinas.destroy');
    Route::get('user/vacinas/{vacina}/edit', [App\Http\Controllers\VacinaController::class, 'edit'])->name('user.vacinas.edit');
    Route::put('/user/vacinas/update/{vacina}', [VacinaController::class, 'update'])->name('user.vacinas.update');
    
    Route::get('/especies', [App\Http\Controllers\EspecieController::class, 'index'])->name('user.especies.index');
    Route::get('/racas', [App\Http\Controllers\RacaController::class, 'index'])->name('user.racas.index');

    //Route::get('user/contatos/create', [ContatoController::class, 'create'])->name('user.contatos.create');
    //Route::post('user/contatos/store', [ContatoController::class, 'store'])->name('user.contatos.store');
    //Route::get('/contatos/create', [App\Http\Controllers\DoencaController::class, 'create'])->name('user.contatos.create');
    //Route::get('/contatos/create', [ContatoController::class, 'create'])->name('contatos.create');
    //Route::post('/contatos/store', [App\Http\Controllers\DoencaController::class, 'store'])->name('user.contatos.store');
});


//Route::get('user/contatos/create', [ContatoController::class, 'create'])->name('user.contatos.create');
//Route::get('/contatos', [ContatoController::class, 'index'])->name('contatos.index');
//Route::post('user/contatos/store', [ContatoController::class, 'store'])->name('contatos.store');
//Route::get('/contatos/cadasto', 'ContatoController@create')->name('contatos.create');


//
//Route::get('/layoutPrivado', function () {
//    return view('layouts/private/layoutPrivado');
//});
//
//

//Route::get('/bairros/Editar/{id_bairro}', [BairroController::class, 'edit'])->name('bairros.edit');
//Route::delete('/bairros/Excluir/{id_bairro}', [BairroController::class, 'destroy'])->name('bairro.destroy');
//Route::put('/bairro/{id}', [BairroController::class, 'update'])->name('bairro.update');
//Route::post('/bairro/cadastro', [BairroController::class, 'store'])->name('bairro.store');
//
//Route::get('/ruas', [RuaController::class, 'index'])->name('ruas.index');
//Route::get('/ruas/Editar/{id_rua}', [RuaController::class, 'edit'])->name('ruas.edit');
//Route::delete('/ruas/Excluir/{id_rua}', [RuaController::class, 'destroy'])->name('rua.destroy');
//Route::put('/rua/{id}', [RuaController::class, 'update'])->name('rua.update');
//Route::post('/rua/cadastro', [RuaController::class, 'store'])->name('rua.store');
//
//Route::post('/municipiogetbyestado', [BairroController::class, 'getMunicipiosByEstado'])->name('getMunicipiosByEstado');
