<?php

namespace App\Http\Controllers;


use App\Models\Ocorrencia;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('public.ocorrencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string',
            'endereco' => 'required|string',
            'descricao' => 'required|string',
        ]);

        try {
            Ocorrencia::create([
                'titulo' => $request->input('titulo'),
                'tipo' => $request->input('tipo'),
                'endereco' => $request->input('endereco'),
                'descricao' => $request->input('descricao')
            ]);

            return redirect()->route('ocorrencias.create')->with('success', 'Ocorrência cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar o animal. Detalhes do erro: ' . $e->getMessage());
        }
    }

}
