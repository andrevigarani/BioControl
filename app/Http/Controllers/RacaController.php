<?php

namespace App\Http\Controllers;

use App\Models\Raca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera os dados da tabela animais com informações sobre a espécie
        $racas = Raca::with('especie')->get();
        //dd($racas);  // Adicione esta linha para depurar
    
        return view('private.raca.index', compact('racas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Raca $raca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Raca $raca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Raca $raca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raca $raca)
    {
        //
    }
}
