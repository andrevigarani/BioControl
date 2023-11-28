<?php

namespace App\Http\Controllers;

use App\Models\Doenca;
use Illuminate\Http\Request;

class DoencaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $doencas = Doenca::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->get();

        return view('private.doenca.index', compact('doencas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.doenca.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        try {
            Doenca::create([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
            ]);

            return redirect()->route('user.doencas.index')->with('success', 'Doença cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a doença. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Doenca $doenca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doenca $doenca)
    {
        return view('private.doenca.edit', compact('doenca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doenca $doenca)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        try {
            $doenca->update([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
            ]);

            return redirect()->route('user.doencas.index')->with('success', 'Doença atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a doença. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doenca $doenca)
    {
        try {
            $doenca->delete();
            return redirect()->route('user.doencas.index')->with('success', 'Doença excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a doença. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
