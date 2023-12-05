@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">PESSOA JURÍDICA</h3>

        <form action="{{ route('user.clinicasVeterinarias.index') }}" method="GET" class="d-inline">
            <input type="text" class="form-text search-bar" placeholder="Digite sua pesquisa..." name="pesquisa" value="{{ request('pesquisa') }}">
            <button class="btn btn-blue" type="submit">Pesquisar</button>
        </form>

        <div class="float-end">
            <a href="{{ route('user.pessoa_juridicas.create') }}" type="button" class="btn btn-success">Nova Pessoa Jurídica</a>
        </div>
    </div>

    <div class="private-content">
        @if($pessoasJuridicas->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há pessoas jurídicas cadastradas!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Número Endereço</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Rua</th>
                    <th scope="col">ID Pessoa</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @foreach($pessoasJuridicas as $pessoaJuridica)
                        <tr class="align-middle text-center">
                            <td>{{ $pessoaJuridica->id }}</td>
                            <td>{{ $pessoaJuridica->cnpj }}</td>
                            <td>{{ $pessoaJuridica->razao_social }}</td>
                            <td>{{ $pessoaJuridica->nome_fantasia }}</td>
                            <td>{{ $pessoaJuridica->fone }}</td>
                            <td>{{ $pessoaJuridica->email }}</td>
                            <td>{{ $pessoaJuridica->numero_endereco }}</td>
                            <td>{{ $pessoaJuridica->complemento }}</td>
                            <td>{{ $pessoaJuridica->rua->nome }}</td>
                            <td>{{ $pessoaJuridica->pessoaFisica->id}}</td>
                            <td>{{ $pessoaJuridica->pessoaFisica->nome}}</td>
                            <td>
                                <a href="{{ route('user.pessoa_juridicas.edit', $pessoaJuridica->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.pessoa_juridicas.destroy', $pessoaJuridica->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
