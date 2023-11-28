@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">VACINAS</h3>

        <form action="{{ route('user.vacinas.index') }}" method="GET" class="d-inline">
            <input type="text" class="form-text search-bar" placeholder="Digite sua pesquisa..." name="pesquisa" value="{{ request('pesquisa') }}">
            <button class="btn btn-blue" type="submit">Pesquisar</button>
        </form>

        <div class="float-end">
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
                        <tr class="align-middle text-center">
                            <td>{{ $vacina->nome }}</td>
                            <td>{{ substr($vacina->descricao,0,70) }}</td>
                            <td>{{ $vacina->periodo }}</td>
                            <td>
                                <a href="{{ route('user.vacinas.edit', $vacina->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.vacinas.destroy', $vacina->id) }}" method="post" class="d-inline">
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
