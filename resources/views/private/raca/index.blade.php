@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">RAÇAS</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-blue">Pesquisar</button>

        <div class="float-end">
            <a href="{{ route('user.racas.create') }}" type="button" class="btn btn-success">Nova Raça</a>
        </div>
    </div>

    <div class="private-content">
        @if($racas->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há raças cadastradas!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">ESPÉCIE</th>
                    <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                    @foreach($racas as $raca)
                        <tr class="align-middle text-center">
                            <td>{{ $raca->id }}</td>
                            <td>{{ $raca->nome }}</td>
                            <td>{{ $raca->especie->nome }}</td>
                            <td>
                                <a href="{{ route('user.racas.edit', $raca->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.racas.destroy', $raca->id) }}" method="post" class="d-inline">
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
