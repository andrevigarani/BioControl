@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">Vacina do {{ $animal->nome }}</h3>
    </div>

    <div class="private-content">
        @if($vaccines->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Animal sem vacinas
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">Vacina</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                </thead>
                <tbody>
                    @foreach($vacinas as $vacina)
                        <tr class="align-middle text-center">
                            <td>{{ $vacina->nome }}</td>
                            <td>{{ $vacina->descricao }}</td>
                            <td>{{ $vacina->data_aplicacao }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection