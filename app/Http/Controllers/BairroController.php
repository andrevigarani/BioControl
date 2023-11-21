<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;

class BairroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $bairros = Bairro::all();

            $estados = Estado::pluck('nome_estado', 'id_estado');
            $municipios = Municipio::all();

            return view('layouts.private.layoutPrivado', compact('bairros', 'estados', 'municipios'));
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
        {

            $request->validate([
                'nome_bairro' => 'required|string',
                'id_municipio' => 'required|integer',
            ]);

            $data = $request->except('_token');

            $municipio = Municipio::find($request->input('id_municipio'));
            if (!$municipio) {
                return redirect()->back()->with('error', 'Município não encontrado. Selecione um município válido.');
            }
            $data = [
                'nome_bairro' => $request->input('nome_bairro'),
                'id_municipio' => $municipio->id_municipio,
            ];

            $bairro = Bairro::create($data);
            return redirect()->route('bairros.index')->with('sucess', 'Bairro Cadastrado com Sucesso');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bairro $bairro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_bairro)
    {
        $bairro = Bairro::find($id_bairro);

        // Verifique se o cardápio foi encontrado
        if (!$bairro) {
            return redirect()->route('bairros.index')->with('error', 'Bairro não encontrado.');
        }

    return view('layouts.private.bairroEditar', compact('bairro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bairro $bairro, $id_bairro)
    {
        $bairro = Bairro::find($id_bairro);

    if ($bairro) {
        // Atualize os campos desejados com base nos dados do formulário
        $bairro->nome_bairro = $request->input('nome_bairro');

        // Salve as alterações no registro
        $bairro->save();

        return redirect()->route('bairros.index')->with('success', 'Bairro atualizado com sucesso');
    }

    return redirect()->route('bairros.index')->with('error', 'Bairro não encontrado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_bairro)
    {
        $bairro = Bairro::where('id_bairro', $id_bairro)->first();

        if ($bairro) {

            $bairro->delete();
            return redirect()->route('bairros.index');
        }

        return redirect()->route('bairros.index');
    }

    public function getMunicipiosByEstado(Request $request)
    {
    $estado_id = $request->input('estado_id');
    $municipios = Municipio::where('id_estado', $estado_id)
                           ->pluck('nome_municipios', 'id_municipio');
    return response()->json($municipios);
    }
}
