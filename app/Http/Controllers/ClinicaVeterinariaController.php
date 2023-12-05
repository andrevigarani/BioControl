<?php

namespace App\Http\Controllers;

use App\Models\ClinicaVeterinaria;
use App\Models\PessoaJuridica;
use Illuminate\Http\Request;

class ClinicaVeterinariaController extends Controller
{
    /*public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $racas = ClinicaVeterinaria::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->get();

        return view('private.clinicaveterinaria.index', compact('clinicas_veterinarias'));
    }*/

    public function index()
    {
        $clinicasVeterinarias = ClinicaVeterinaria::with('pessoaJuridica')->get();

        return view('private.ClinicaVeterinaria.index', compact('clinicasVeterinarias'));
    }

    public function create()
    {
        $pessoasJuridicas = PessoaJuridica::all();

        return view('private.ClinicaVeterinaria.create', compact('pessoasJuridicas')); // Updated view name
    }

    public function store(Request $request)
    {
        $request->validate([
            'pessoa_juridica' => 'required|int',
        ]);

        try {
            ClinicaVeterinaria::create([
                'id_pessoa_juridica' => $request->input('pessoa_juridica'),
            ]);

            return redirect()->route('user.clinicasVeterinarias.index')->with('success', 'Clínica Veterinária cadastrada com sucesso!'); // Updated route name
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a clínica veterinária. Detalhes do erro: ' . $e->getMessage());
        }
    }

    public function show(ClinicaVeterinaria $clinicaVeterinaria) 
    {
        return view('private.ClinicaVeterinaria.show', compact('clinicaVeterinaria')); 
    }

    public function edit(ClinicaVeterinaria $clinicaVeterinaria) 
    {
        $pessoasJuridicas = PessoaJuridica::all();
        return view('private.ClinicaVeterinaria.edit', compact('clinicaVeterinaria', 'pessoasJuridicas')); 
    }

    public function update(Request $request, ClinicaVeterinaria $clinicaVeterinaria) 
    {
        $request->validate([
            'pessoa_juridica' => 'required|int',
        ]);

        try {
            $clinicaVeterinaria->update([
                'id_pessoa_juridica' => $request->input('pessoa_juridica'),
            ]);

            return redirect()->route('user.clinicasVeterinarias.index')->with('success', 'Clínica Veterinária atualizada com sucesso!'); // Updated route name
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a clínica veterinária. Detalhes do erro: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $clinicaVeterinaria = ClinicaVeterinaria::find($id);
    
        if (!$clinicaVeterinaria) {
            return redirect()->route('user.clinicasVeterinarias.index')->with('error', 'Clínica veterinária não encontrada.');
        }
    
        $clinicaVeterinaria->delete();
    
        return redirect()->route('user.clinicasVeterinarias.index')->with('success', 'Clínica veterinária excluída com sucesso!');
    }
}
