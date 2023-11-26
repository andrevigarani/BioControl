@extends('layouts.private.app')

@section('content')
    <div class="private-header">
        <h3>ESPÉCIES</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-info">Pesquisar</button>

    </div>

    <div class="private-content">
        @if($especies->isEmpty())
            <table class="table table-striped w-100">
                <tr>
                    <td class="text-center">
                        Não há espécies cadastradas!
                    </td>
                </tr>
            </table>
        @else
            <table class="table table-striped w-100">
                <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                </thead>
                <tbody>
                    @foreach($especies as $especie)
                        <tr style="vertical-align: middle" class="text-center">
                            <td>{{ $especie->id }}</td>
                            <td>{{ $especie->nome }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
