@extends('layouts.public.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if($contatos->isEmpty())
                    <table class="table table-striped w-100">
                        <tr>
                            <td class="text-center">
                                Não há contatos cadastrados!
                            </td>
                        </tr>
                    </table>
                @else
                    <table class="table table-striped w-100">
                        <thead class="text-center">
                        <th scope="col">NOME</th>
                        <th scope="col">TELEFONE</th>
                        </thead>
                        <tbody>
                        @foreach($contatos as $contato)
                            <tr class="align-middle text-center">
                                <td>{{ $contato->nome }}</td>
                                <td>{{ $contato->fone }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
