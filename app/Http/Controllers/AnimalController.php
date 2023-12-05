<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\PessoaFisica;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function adocaoIndex()
    {
        return view('public.dev');
    }

    public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $animais = Animal::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->with('pessoa_fisica')->get();

        return view('private.animal.index', compact('animais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pessoafisicas = PessoaFisica::all();

        return view('private.animal.create', compact('pessoafisicas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'falecimento' => 'nullable|date',
            'castracao' => 'nullable|date',
            'id_responsavel_animal' => 'required|exists:pessoas_fisicas,id',
        ]);

        try {
            Animal::create([
                'nome' => $request->input('nome'),
                'nascimento' => $request->input('nascimento'),
                'falecimento' => $request->input('falecimento'),
                'castracao' => $request->input('castracao'),
                'id_responsavel_animal' => $request->input('id_responsavel_animal'),
                'id_raca' => 1,
                'id_chip' => null,
                'id_clinica_veterinaria' => null,
                'id_abrigo' => null,
            ]);

            return redirect()->route('user.animais.index')->with('success', 'Animal cadastrado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar o animal. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $pessoafisicas = PessoaFisica::all(); // Obtém todos os responsáveis para o campo de seleção
        return view('private.animal.edit', compact('animal', 'pessoafisicas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'falecimento' => 'nullable|date',
            'castracao' => 'nullable|date',
            'id_responsavel_animal' => 'required|exists:responsaveis,id',
        ]);

        try {
            $animal->update([
                'nome' => $request->input('nome'),
                'nascimento' => $request->input('nascimento'),
                'falecimento' => $request->input('falecimento'),
                'castracao' => $request->input('castracao'),
                'id_responsavel_animal' => $request->input('id_responsavel_animal'),
            ]);

            return redirect()->route('user.animais.index')->with('success', 'Animal atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar o animal. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        try {
            $animal->delete();
            return redirect()->route('user.animais.index')->with('success', 'Animal excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir o animal. Detalhes do erro: ' . $e->getMessage());
        }
    }

}
