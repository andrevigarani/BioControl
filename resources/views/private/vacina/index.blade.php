@extends('layouts.private.app')

@section('content')
    <div class="private-header">
        <h3>VACINAS</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-info">Pesquisar</button>

        <div style="float: right">
            <a href="{{ route('user.vacinas.create') }}" type="button" class="btn btn-success">Nova Vacina</a>
        </div>
    </div>

    <div class="private-content">
        @if($vacinas->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há vacinas cadastradas!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">NOME</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">PERÍODO</th>
                    <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                    @foreach($vacinas as $vacina)
                        <tr style="vertical-align: middle" class="text-center">
                            <td>{{ $vacina->nome }}</td>
                            <td>{{ $vacina->descricao }}</td>
                            <td>{{ $vacina->periodo }}</td>
                            <td>
                                <a href="{{ route('user.vacinas.edit', $vacina->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.vacinas.destroy', $vacina->id) }}" method="post" style="display:inline">
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
