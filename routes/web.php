<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BairroController;
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
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('home');
    //return redirect()->route('login');
});

Auth::routes(['reset' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
//Route::get('/layoutPrivado', function () {
//    return view('layouts/private/layoutPrivado');
//});
//
////Route::resource('bairros', BairroController::class);
//
//Route::get('/bairros', [BairroController::class, 'index'])->name('bairros.index');
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
