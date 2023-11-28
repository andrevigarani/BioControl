<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $vacinas = Vacina::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->get();

        return view('private.vacina.index', compact('vacinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.vacina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'periodo' => 'required|string|max:255',
        ]);

        try {
            Vacina::create([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
                'periodo' => $request->input('periodo'),
            ]);

            return redirect()->route('user.vacinas.index')->with('success', 'Vacina cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Vacina $vacina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacina $vacina)
    {
        return view('private.vacina.edit', compact('vacina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacina $vacina)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'periodo' => 'required|string|max:255',
        ]);

        try {
            $vacina->update([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
                'periodo' => $request->input('periodo'),
            ]);

            return redirect()->route('user.vacinas.index')->with('success', 'Vacina atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacina $vacina)
    {
        try {
            $vacina->delete();
            return redirect()->route('user.vacinas.index')->with('success', 'Vacina excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
