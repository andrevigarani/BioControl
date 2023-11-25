<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\RuaController;

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

    Route::get('/contatos', [App\Http\Controllers\ContatoController::class, 'privateIndex'])->name('user.contatos.index');
    Route::get('/contactos', [App\Http\Controllers\DoencaController::class, 'index'])->name('user.cntatos.index');
    Route::get('/contacctos', [App\Http\Controllers\DoencaController::class, 'index'])->name('user.conttos.index');

});

//
//Route::get('/layoutPrivado', function () {
//    return view('layouts/private/layoutPrivado');
//});
//
//

Route::get('/contatos', [ContatoController::class, 'index'])->name('contatos.index');

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
