<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Abrigo;
use App\Models\PessoaJuridica;
use Illuminate\Http\Request;

class AbrigoController extends Controller
{
    /*public function privateIndex()
    {
        $pesquisa = request('pesquisa');

        $racas = Abrigo::when($pesquisa, function ($query) use ($pesquisa) {
            return $query->where('nome', 'like', '%'.$pesquisa.'%');
        })->get();

        return view('private.abrigos.index', compact('abrigos'));
    }*/

    public function index()
    {
        $abrigos = Abrigo::with('pessoaJuridica')->get();

        return view('private.abrigo.index', compact('abrigos'));
    }

    public function create()
    {
        $pessoasJuridicas = PessoaJuridica::all();

        return view('private.abrigo.create', compact('pessoasJuridicas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pessoa_juridica' => 'required|int',
        ]);

        try {
            Abrigo::create([
                'id_pessoa_juridica' => $request->input('pessoa_juridica'),
            ]);

            return redirect()->route('user.abrigos.index')->with('success', 'Abrigo cadastrado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar o abrigo. Detalhes do erro: ' . $e->getMessage());
        }
    }

    public function show(Abrigo $abrigo)
    {

        return view('private.abrigo.show', compact('abrigo'));
    }

    public function edit(Abrigo $abrigo)
    {
        $pessoasJuridicas = PessoaJuridica::all();
        return view('private.abrigo.edit', compact('abrigo', 'pessoasJuridicas'));
    }

    public function update(Request $request, Abrigo $abrigo)
    {
        $request->validate([
            'pessoa_juridica' => 'required|int',
        ]);

        try {
            $abrigo->update([
                'id_pessoa_juridica' => $request->input('pessoa_juridica'),
            ]);

            return redirect()->route('user.abrigos.index')->with('success', 'Abrigo atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar o abrigo. Detalhes do erro: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $clinicaVeterinaria = Abrigo::find($id);
    
        if (!$clinicaVeterinaria) {
            return redirect()->route('user.abrigos.index')->with('error', 'Clínica veterinária não encontrada.');
        }
    
        $clinicaVeterinaria->delete();
    
        return redirect()->route('user.abrigos.index')->with('success', 'Clínica veterinária excluída com sucesso!');
    }
}
