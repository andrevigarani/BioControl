@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">ANIMAIS</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-blue">Pesquisar</button>

        <div class="float-end">
            <a href="{{ route('user.animais.create') }}" type="button" class="btn btn-success">Novo Animal</a>
        </div>
    </div>

    <div class="private-content">
        @if($animais->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há animais cadastrados!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">NASCIMENTO</th>
                    <th scope="col">FALECIMENTO</th>
                    <th scope="col">CASTRAÇÃO</th>
                    <th scope="col">RESPONSÁVEL</th>
                    <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                    @foreach($animais as $animal)
                        <tr class="align-middle text-center">
                            <td>{{ $animal->id }}</td>
                            <td>{{ $animal->nome }}</td>
                            <td>{{ $animal->nascimento }}</td>
                            <td>{{ $animal->falecimento ?? 'Não informado' }}</td>
                            <td>{{ $animal->castracao ?? 'Não informado' }}</td>
                            <td>{{ $animal->user->nome }}</td>
                            <td>
                                <a href="{{ route('user.animais.edit', $animal->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('user.animais.destroy', $animal->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                                <a href="{{ route('user.animaisvacinas.edit', $animal->id) }}" class="btn btn-warning">Vacinas</a>
                                <a href="{{ route('user.animaisdoencas.edit', $animal->id) }}" class="btn btn-warning">Doenças</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection