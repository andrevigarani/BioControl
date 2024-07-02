<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use Illuminate\Http\Request;

class DicaController extends Controller
{

    public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $dicas = Dica::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('descricao', 'like', '%'.$pesquisa.'%');
        })->get();

        return view('private.dica.index', compact('dicas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('private.dica.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:50',
            'descricao' => 'required|string',
        ]);

        try {
            Dica::create([
                'titulo' => $request->input('titulo'),
                'descricao' => $request->input('descricao'),
            ]);

            return redirect()->route('user.dicas.index')->with('success', 'Dica cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a dica. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dica $dica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dica $dica)
    {
        return view('private.dica.edit', compact('dica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dica $dica)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        try {
            $dica->update([
                'titulo' => $request->input('titulo'),
                'descricao' => $request->input('descricao'),
            ]);

            return redirect()->route('user.dicas.index')->with('success', 'Dica atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a dica. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dica $dica)
    {
        try {
            $dica->delete();
            return redirect()->route('user.dicas.index')->with('success', 'Dica excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a dica. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
