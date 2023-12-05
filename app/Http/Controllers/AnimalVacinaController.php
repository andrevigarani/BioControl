<?php

namespace App\Http\Controllers;

use App\Models\AnimalVacina;
use App\Models\Animal;
use App\Models\Vacina;
use Illuminate\Http\Request;

class AnimalVacinaController extends Controller
{

    public function privateIndex(Animal $animal)
    {

        $animal_vacinas = AnimalVacina::where('id_animal', '=', $animal->id)->with('vacina')->get();

        return view('private.animal.vacina.index', compact('animal_vacinas', 'animal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Animal $animal)
    {
        $vacinas = Vacina::all();

        return view('private.animal.vacina.create', compact('vacinas', 'animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Animal $animal)
    {
        $request->validate([
            'data_aplicacao' => 'required|date',
            'id_vacina' => 'required|exists:vacinas,id',
        ]);

        try {
            AnimalVacina::create([
                'data_aplicacao' => $request->input('data_aplicacao'),
                'id_vacina' => $request->input('id_vacina'),
                'id_animal' => $animal->id,
            ]);

            return redirect()->route('user.animais.vacinas.index', $animal->id)->with('success', 'Vacina cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal, AnimalVacina $animal_vacina)
    {
        $vacinas = Vacina::all();
        return view('private.animal.vacina.edit', compact('animal', 'vacinas', 'animal_vacina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal, AnimalVacina $animal_vacina)
    {
        $request->validate([
            'data_aplicacao' => 'required|date',
            'id_vacina' => 'required|exists:vacinas,id',
        ]);

        try {
            $animal_vacina->update([
                'data_aplicacao' => $request->input('data_aplicacao'),
                'id_vacina' => $request->input('id_vacina'),
                'id_animal' => $animal->id,
            ]);

            return redirect()->route('user.animais.vacinas.index', $animal_vacina->id_animal)->with('success', 'Vacina atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal, AnimalVacina $animal_vacina)
    {
        try {
            $animal_vacina->delete();
            return redirect()->route('user.animais.vacinas.index', $animal_vacina->id_animal)->with('success', 'Vacina excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }

}
