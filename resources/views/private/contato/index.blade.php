@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">CONTATOS</h3>

        <form action="{{ route('user.contatos.index') }}" method="GET" class="d-inline">
            <input type="text" class="form-text search-bar" placeholder="Digite sua pesquisa..." name="pesquisa" value="{{ request('pesquisa') }}">
            <button class="btn btn-blue" type="submit">Pesquisar</button>
        </form>

        <div class="float-end">
            <a href="{{ route('user.contatos.create') }}" type="button" class="btn btn-success">Novo Contato</a>
        </div>
    </div>

    <div class="private-content">
        @if($contatos->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há contatos cadastrados!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">NOME</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                    @foreach($contatos as $contato)
                        <tr class="align-middle text-center">
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->fone }}</td>
                            <td>
                                <a href="{{ route('user.contatos.edit', $contato->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.contatos.destroy', $contato->id) }}" method="post" class="d-inline">
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
