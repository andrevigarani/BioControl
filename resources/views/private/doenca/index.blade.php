@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">DOENÇAS</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-blue">Pesquisar</button>

        <div class="float-end">
            <a href="{{ route('user.doencas.create') }}" type="button" class="btn btn-success">Nova Doença</a>
        </div>
    </div>

    <div class="private-content">
        @if($doencas->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há doenças cadastradas!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                    @foreach($doencas as $doenca)
                        <tr class="align-middle text-center">
                            <td>{{ $doenca->id }}</td>
                            <td>{{ $doenca->nome }}</td>
                            <td>{{ substr($doenca->descricao,0,70) }}</td>
                            <td>
                                <a href="{{ route('user.doencas.edit', $doenca->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.doencas.destroy', $doenca->id) }}" method="post" class="d-inline">
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
