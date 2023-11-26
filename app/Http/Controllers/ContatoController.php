<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        $contatos = Contato::all();
        return view('private.contato.index', compact('contatos'));
    }

    public function privateIndex()
    {

        $contatos = new Collection();

        return view('private.contato.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contatos = Contato::all();

        return view('private.contato.create', ['contatos' => $contatos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valide os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'fone' => 'required|string|regex:/^[0-9()+\-]+$/|max:20',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Tente criar um novo contato
        try {
            Contato::create([
                'nome' => $request->input('nome'),
                'fone' => $request->input('fone'),
                // Adicione outros campos conforme necessário
            ]);

            //Log::info('Contato cadastrado com sucesso!');

            return redirect()->route('user.contatos.index')->with('success', 'Contato cadastrado com sucesso!');
        } catch (\Exception $e) {
            //Log::error('Erro ao cadastrar o contato: ' . $e->getMessage());
            return back()->with('error', 'Erro ao cadastrar o contato. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contato $contato)
    {
        return view('private.contato.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contato $contato)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'fone' => 'required|string|regex:/^[0-9()+\-]+$/|max:20',
            // Adicione outras regras de validação conforme necessário
        ]);
    
        try {
            $contato->update([
                'nome' => $request->input('nome'),
                'fone' => $request->input('fone'),
                // Adicione outros campos conforme necessário
            ]);
    
           // Log::info('Contato atualizado com sucesso!');
    
            return redirect()->route('user.contatos.index')->with('success', 'Contato atualizado com sucesso!');
        } catch (\Exception $e) {
            // Log::error('Erro ao atualizar o contato: ' . $e->getMessage());
            return back()->with('error', 'Erro ao atualizar o contato. Detalhes do erro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        try {
            $contato->delete();
            return redirect()->route('user.contatos.index')->with('success', 'Contato excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir o contato. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
