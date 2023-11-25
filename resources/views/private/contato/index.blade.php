@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3>CONTATOS</h3>

        <input type="text" class="form-text search-bar">
        <button type="button" class="btn btn-info">Pesquisar</button>

        <div style="float: right">
            <button type="button" class="btn btn-success">Novo Contato</button>
        </div>

    </div>

    <div class="private-content">
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
                    <th scope="col">PLA</th>
                    <th scope="col">Valor</th>
                    </thead>
                    <tbody>
                    @php $total = 0 @endphp
                    @foreach($bagItems as $bagItem)
                        <tr style="vertical-align: middle" class="text-center">
                            <td>{{ $bagItem->product_name }}</td>
                            <td>{{ $bagItem->quantity }}</td>
                            <td>R$ {{ number_format($bagItem->sub_total,2) }}</td>
                            @php $total += $bagItem->sub_total @endphp
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="bg-secondary bg-opacity-50">
                        <td colspan="3">Total</td>
                        <td class="text-center">R$ {{ number_format($total,2) }}</td>
                    </tr>
                    </tfoot>
                </table>
            @endif
        </div>
    </div>
@endsection
