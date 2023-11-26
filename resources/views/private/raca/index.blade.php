@extends('layouts.private.app')

@section('content')
    <div class="private-header">
        <h3>RAÇAS</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-info">Pesquisar</button>

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
                    <th scope="col">ESPECIE</th>
                </thead>
                <tbody>
                    @foreach($racas as $raca)
                        <tr style="vertical-align: middle" class="text-center">
                            <td>{{ $raca->id }}</td>
                            <td>{{ $raca->nome }}</td>
                            <td>
                                @if ($raca->especie) 
                                    {{ $raca->especie->nome }}
                                @else
                                    Sem espécie associada
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
