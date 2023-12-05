@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">VACINAS - {{ $animal->nome }}</h3>

        <div style="height: 30px; display: inline-block"></div>

        <div class="float-end">
            <a href="{{ route('user.animais.vacinas.create', $animal->id) }}" type="button" class="btn btn-success">Nova Vacina</a>
        </div>
    </div>

    <div class="private-content">
        @if($animal_vacinas->isEmpty())
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
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">APLICAÇÃO</th>
                <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                @foreach($animal_vacinas as $animal_vacina)
                    <tr class="align-middle text-center">
                        <td>{{ $animal_vacina->id }}</td>
                        <td>{{ $animal_vacina->vacina->nome }}</td>
                        <td>{{ $animal_vacina->data_aplicacao}}</td>
                        <td>
                            <a href="{{ route('user.animais.vacinas.edit', [$animal_vacina->id_animal, $animal_vacina->id]) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('user.animais.vacinas.destroy', [$animal_vacina->id_animal, $animal_vacina->id]) }}" method="post" class="d-inline">
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
