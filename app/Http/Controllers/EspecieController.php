<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{

    public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $especies = Especie::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->get();

        return view('private.especie.index', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('private.especie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        try {
            Especie::create([
                'nome' => $request->input('nome'),
            ]);

            return redirect()->route('user.especies.index')->with('success', 'Espécie cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a espécie. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Especie $especie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especie $especie)
    {
        return view('private.especie.edit', compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especie $especie)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        try {
            $especie->update([
                'nome' => $request->input('nome'),
            ]);

            return redirect()->route('user.especies.index')->with('success', 'Espécie atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a espécie. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especie $especie)
    {
        try {
            $especie->delete();
            return redirect()->route('user.especies.index')->with('success', 'Espécie excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a espécie. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
