@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">EDITAR VACINA - {{ $animal->nome }}</h3>
    </div>

    <div class="private-content bg-light" style="--bs-bg-opacity: 0.85">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 p-5">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.animais.vacinas.update', [$animal->id , $animal_vacina->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_vacina">Vacina:</label>
                            <select name="id_vacina" class="form-control" required>
                                <option value="" >Selecione uma vacina</option>
                                @foreach($vacinas as $vacina)
                                    <option value="{{ $vacina->id }}" {{ $animal_vacina->id_vacina == $vacina->id ? 'selected' : '' }}>
                                        {{ $vacina->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_aplicacao">Início dos sintomas:</label>
                            <input type="date" name="data_aplicacao" class="form-control" required value="{{ $animal_vacina->data_aplicacao }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Gravar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
