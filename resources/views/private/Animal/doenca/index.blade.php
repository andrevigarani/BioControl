@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">DOENÇAS - {{ $animal->nome }}</h3>

        <div style="height: 30px; display: inline-block"></div>

        <div class="float-end">
            <a href="{{ route('user.animais.doencas.create', $animal->id) }}" type="button" class="btn btn-success">Nova Doença</a>
        </div>
    </div>

    <div class="private-content">
        @if($animal_doencas->isEmpty())
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
                <th scope="col">INÍCIO</th>
                <th scope="col">CURA</th>
                <th scope="col">AÇÕES</th>
                </thead>
                <tbody>
                @foreach($animal_doencas as $animal_doenca)
                    <tr class="align-middle text-center">
                        <td>{{ $animal_doenca->id }}</td>
                        <td>{{ $animal_doenca->doenca->nome }}</td>
                        <td>{{ $animal_doenca->data_inicio ?? 'Não informado' }}</td>
                        <td>{{ $animal_doenca->data_cura ?? 'Não informado' }}</td>
                        <td>
                            <a href="{{ route('user.animais.doencas.edit', [$animal_doenca->id_animal, $animal_doenca->id]) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('user.animais.doencas.destroy', [$animal_doenca->id_animal, $animal_doenca->id]) }}" method="post" class="d-inline">
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
