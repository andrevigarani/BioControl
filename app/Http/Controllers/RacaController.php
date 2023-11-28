<?php

namespace App\Http\Controllers;

use App\Models\Raca;
use App\Models\Especie;
use Illuminate\Http\Request;

class RacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $racas = Raca::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->with('especie')->get();

        return view('private.raca.index', compact('racas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especies = Especie::all();

        return view('private.raca.create', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|int',
        ]);

        try {
            Raca::create([
                'nome' => $request->input('nome'),
                'id_especie' => $request->input('especie'),
            ]);

            return redirect()->route('user.racas.index')->with('success', 'Raça cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a raça. Detalhes do erro: ' . $e->getMessage());
        }
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
        $especies = Especie::all();
        return view('private.raca.edit', compact('raca', 'especies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Raca $raca)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|int',
        ]);

        try {
            $raca->update([
                'nome' => $request->input('nome'),
                'id_especie' => $request->input('especie'),
            ]);

            return redirect()->route('user.racas.index')->with('success', 'Raça atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a raça. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raca $raca)
    {
        try {
            $raca->delete();
            return redirect()->route('user.racas.index')->with('success', 'Raça excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a raça. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
