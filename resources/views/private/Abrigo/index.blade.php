@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">ABRIGOS</h3>

        <form action="{{ route('user.abrigos.index') }}" method="GET" class="d-inline">
            <input type="text" class="form-text search-bar" placeholder="Digite sua pesquisa..." name="pesquisa" value="{{ request('pesquisa') }}">
            <button class="btn btn-blue" type="submit">Pesquisar</button>
        </form>

        <div class="float-end">
            <a href="{{ route('user.abrigos.create') }}" type="button" class="btn btn-success">Novo Abrigo  </a>
        </div>
    </div>

    <div class="private-content">
        @if($abrigos->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há abrigos cadastrados!
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
                    @foreach($abrigos as $abrigo)
                        <tr class="align-middle text-center">
                            <td>{{ $abrigo->id }}</td>
                            <td>{{ $abrigo->pessoaJuridica->cnpj }}</td>
                            <td>{{ $abrigo->pessoaJuridica->razao_social }}</td>
                            <td>{{ $abrigo->pessoaJuridica->nome_fantasia }}</td>
                            <td>{{ $abrigo->pessoaJuridica->fone }}</td>
                            <td>{{ $abrigo->pessoaJuridica->email }}</td>
                            <td>{{ $abrigo->pessoaJuridica->numero_endereco }}</td>
                            <td>{{ $abrigo->pessoaJuridica->complemento }}</td>
                            <td>{{ $abrigo->pessoaJuridica->rua->nome}}</td>
                            <td>{{ $abrigo->pessoaJuridica->pessoaFisica->id}}</td>
                            <td>{{ $abrigo->pessoaJuridica->pessoaFisica->nome}}</td>
                            <td>
                                <a href="{{ route('user.abrigos.edit', $abrigo->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.abrigos.destroy', $abrigo->id) }}" method="post" class="d-inline">
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
