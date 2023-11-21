<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use App\Models\Rua;
use Illuminate\Http\Request;


class RuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $ruas = Rua::all();
            $bairros = Rua::with('bairro')->get();
            //$nomeBairro = $rua->bairro->nome_bairro;
            return view('layouts.private.ruaListar', compact('ruas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_rua' => 'required|string',
            'nome_bairro' => 'required|string',
        ]);

        $nome_bairro = $request->input('nome_bairro');

        // Verifique se o campo nome_bairro não está vazio
        if (empty($nome_bairro)) {
            // Se o campo estiver vazio, mostre a mensagem de erro
            return redirect()->back()->with('error', 'Nome do bairro não informado.');
        }

        // Tente encontrar o bairro com base no nome informado
        $bairro = Bairro::where('nome_bairro', $nome_bairro)->first();

        // Verifique se o bairro foi encontrado
        if (!$bairro) {
            // Se o bairro não existir, mostre a mensagem de erro
            //return redirect()->back()->with('error', 'Bairro não cadastrado. Cadastre o bairro primeiro.');
            session()->flash('error', 'Bairro não cadastrado. Cadastre o bairro primeiro.');
            return redirect()->back();
        } else {
            $bairros = Rua::with('bairro')->get();
            //$nomeBairro = $rua->bairro->nome_bairro;

            $data = [
                'nome_rua' => $request->input('nome_rua'),
                'id_bairro' => $bairro->id_bairro, // Aqui estamos usando o ID do bairro
            ];

            $rua = Rua::create($data);
            return redirect()->route('ruas.index')->with('sucess', 'Rua Cadastrada com Sucesso');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(Rua $rua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_rua)
    {
        $rua = Rua::find($id_rua);

        // Verifique se o cardápio foi encontrado
        if (!$rua) {
            return redirect()->route('ruas.index')->with('error', 'Rua não encontrada.');
        }

    return view('layouts.private.ruaEditar', compact('rua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rua $rua, $id_rua)
    {
        $rua = Rua::find($id_rua);

    if ($rua) {
        // Atualize os campos desejados com base nos dados do formulário
        $rua->nome_rua = $request->input('nome_rua');

        // Salve as alterações no registro
        $rua->save();

        return redirect()->route('ruas.index')->with('success', 'Rua atualizada com sucesso');
    }

    return redirect()->route('ruas.index')->with('error', 'Rua não encontrado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_rua)
    {
        {
            $rua = Rua::where('id_rua', $id_rua)->first();

            if ($rua) {

                $rua->delete();
                return redirect()->route('ruas.index');
            }

            return redirect()->route('ruas.index');
        }
    }
}
