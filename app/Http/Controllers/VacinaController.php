<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacinas = Vacina::all();
        return view('private.vacina.index', compact('vacinas'));
    }

    public function privateIndex()
    {

        $vacinas = new Collection();

        return view('private.vacina.index', compact('vacinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vacinas = Vacina::all();

        return view('private.vacina.create', ['vacinas' => $vacinas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valide os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'periodo' => 'required|string|max:255',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Tente criar um novo contato
        try {
            Vacina::create([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
                'periodo' => $request->input('periodo'),
                // Adicione outros campos conforme necessário
            ]);

            //Log::info('Contato cadastrado com sucesso!');

            return redirect()->route('user.vacinas.index')->with('success', 'Vacina cadastradA com sucesso!');
        } catch (\Exception $e) {
            //Log::error('Erro ao cadastrar o contato: ' . $e->getMessage());
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
            // Adicione outras regras de validação conforme necessário
        ]);
    
        try {
            $vacina->update([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
                'periodo' => $request->input('periodo'),
                // Adicione outros campos conforme necessário
            ]);
    
           // Log::info('Contato atualizado com sucesso!');
    
            return redirect()->route('user.vacinas.index')->with('success', 'Vacina atualizadA com sucesso!');
        } catch (\Exception $e) {
            // Log::error('Erro ao atualizar o contato: ' . $e->getMessage());
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
            return redirect()->route('user.vacinas.index')->with('success', 'Vacina excluídA com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a vacina. Detalhes do erro: ' . $e->getMessage());
        }
    }
}
