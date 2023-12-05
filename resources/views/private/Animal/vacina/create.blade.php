@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">NOVA VACINA - {{ $animal->nome }}</h3>
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

                    <form action="{{ route('user.animais.vacinas.store', $animal->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_vacina">Vacina:</label>
                            <select name="id_vacina" class="form-control" required>
                                <option value="" >Selecione uma vacina</option>
                                @foreach($vacinas as $vacina)
                                    <option value="{{ $vacina->id }}" {{ old('id_vacina') == $vacina->id ? 'selected' : '' }}>
                                        {{ $vacina->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_aplicacao">Aplicação:</label>
                            <input type="date" name="data_aplicacao" class="form-control" required value="{{ old('data_aplicacao') }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
