<?php

namespace App\Http\Controllers;

use App\Models\PessoaJuridica;
use Illuminate\Http\Request;

class PessoaJuridicaController extends Controller
{
    public function index()
    {
        $pessoasJuridicas = PessoaJuridica::all();

        return view('private.pessoaJuridica.index', compact('pessoasJuridicas'));
    }

    public function create()
    {
        return view('private.pessoaJuridica.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cnpj' => 'required|numeric|digits:14|unique:pessoas_juridicas,cnpj',
            'razao_social' => 'required|string',
            'nome_fantasia' => 'nullable|string',
            'fone' => 'required|string',
            'email' => 'required|email|unique:pessoas_juridicas,email',
            'numero_endereco' => 'nullable|string',
            'complemento' => 'nullable|string',
            'id_rua' => 'required|int|exists:ruas,id',
            'id_pessoa_fisica' => 'required|int|exists:pessoas_fisicas,id',
        ]);

        try {
            PessoaJuridica::create($request->all());

            return redirect()->route('user.pessoa_juridicas.index')->with('success', 'Pessoa Jurídica cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao cadastrar a Pessoa Jurídica. Detalhes do erro: ' . $e->getMessage());
        }
    }

    public function show(PessoaJuridica $pessoaJuridica)
    {
        return view('private.pessoaJuridica.show', compact('pessoaJuridica'));
    }

    public function edit(PessoaJuridica $pessoaJuridica)
    {
        return view('private.pessoaJuridica.edit', compact('pessoaJuridica'));
    }

    public function update(Request $request, PessoaJuridica $pessoaJuridica)
    {
        $request->validate([
            'cnpj' => 'required|numeric|digits:14|unique:pessoas_juridicas,cnpj,' . $pessoaJuridica->id,
            'razao_social' => 'required|string',
            'nome_fantasia' => 'nullable|string',
            'fone' => 'required|string',
            'email' => 'required|email|unique:pessoas_juridicas,email,' . $pessoaJuridica->id,
            'numero_endereco' => 'nullable|string',
            'complemento' => 'nullable|string',
            'id_rua' => 'required|int|exists:ruas,id',
            'id_pessoa_fisica' => 'required|int|exists:pessoas_fisicas,id',
        ]);

        try {
            $pessoaJuridica->update($request->all());

            return redirect()->route('user.pessoa_juridicas.index')->with('success', 'Pessoa Jurídica atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a Pessoa Jurídica. Detalhes do erro: ' . $e->getMessage());
        }
    }

    public function destroy(PessoaJuridica $pessoaJuridica)
    {
        try {
            $pessoaJuridica->delete();
            return redirect()->route('user.pessoa_juridicas.index')->with('success', 'Pessoa Jurídica excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir a Pessoa Jurídica. Detalhes do erro: ' . $e->getMessage());
        }
    }

    
}
