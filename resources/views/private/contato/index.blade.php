@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        CONTATOS
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if($contatos->isEmpty())
                    <p>Não há contatos disponíveis.</p>

                @else
                    <table class="table table-striped">
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
                                <td style="width: 300px">
                                    <img src="data:image/png;base64, {{ $bagItem->product_image }}"
                                         alt="{{ $bagItem->product_name }}" style="width: 100%;">
                                </td>
                                <td>{{ $bagItem->product_name }}</td>
                                <td>
                                    <span onclick="updateQuantity({{$bagItem->product_id}}, 'S')"
                                          style="margin-right: 20px; cursor: pointer;"><</span>
                                    <span id="quantityProduct{{$bagItem->product_id}}">{{ $bagItem->quantity }}</span>
                                    <span onclick="updateQuantity({{$bagItem->product_id}}, 'A')"
                                          style="margin-left: 20px; cursor: pointer;">></span>
                                </td>
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
    </div>
@endsection
