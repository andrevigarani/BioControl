<?php

namespace App\Http\Controllers;

use App\Models\AnimalDoenca;
use App\Models\Animal;
use App\Models\Doenca;
use Illuminate\Http\Request;

class AnimalDoencaController extends Controller
{

    public function privateIndex(Animal $animal)
    {

        $animal_doencas = AnimalDoenca::where('id_animal', '=', $animal->id)->with('doenca')->get();

        return view('private.animal.doenca.index', compact('animal_doencas', 'animal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Animal $animal)
    {
        $doencas = Doenca::all();

        return view('private.animal.doenca.create', compact('doencas', 'animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Animal $animal)
    {
        $request->validate([
            'data_inicio' => 'required|date',
            'data_cura' => 'nullable|date',
            'id_doenca' => 'required|exists:doencas,id',
        ]);

        try {
            AnimalDoenca::create([
                'data_inicio' => $request->input('data_inicio'),
                'data_cura' => $request->input('data_cura'),
                'id_doenca' => $request->input('id_doenca'),
                'id_animal' => $animal->id,
            ]);

            return redirect()->route('user.animais.doencas.index', $animal->id)->with('success', 'Doença cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a doença. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal, AnimalDoenca $animal_doenca)
    {
        $doencas = Doenca::all();
        return view('private.animal.doenca.edit', compact('animal', 'doencas', 'animal_doenca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal, AnimalDoenca $animal_doenca)
    {
        $request->validate([
            'data_inicio' => 'required|date',
            'data_cura' => 'nullable|date',
            'id_doenca' => 'required|exists:doencas,id',
        ]);

        try {
            $animal_doenca->update([
                'data_inicio' => $request->input('data_inicio'),
                'data_cura' => $request->input('data_cura'),
                'id_doenca' => $request->input('id_doenca'),
                'id_animal' => $animal->id,
            ]);

            return redirect()->route('user.animais.doencas.index', $animal_doenca->id_animal)->with('success', 'Doença atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a doença. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal, AnimalDoenca $animal_doenca)
    {
        try {
            $animal_doenca->delete();
            return redirect()->route('user.animais.doencas.index', $animal_doenca->id_animal)->with('success', 'Doença excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a doença. Detalhes do erro: ' . $e->getMessage());
        }
    }

}
