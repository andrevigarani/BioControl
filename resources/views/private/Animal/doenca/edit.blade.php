@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">EDITAR DOENÇA - {{ $animal->nome }}</h3>
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

                    <form action="{{ route('user.animais.doencas.update', [$animal->id , $animal_doenca->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_doenca">Doença:</label>
                            <select name="id_doenca" class="form-control" required>
                                <option value="" >Selecione uma doença</option>
                                @foreach($doencas as $doenca)
                                    <option value="{{ $doenca->id }}" {{ $animal_doenca->id_doenca == $doenca->id ? 'selected' : '' }}>
                                        {{ $doenca->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_inicio">Início dos sintomas:</label>
                            <input type="date" name="data_inicio" class="form-control" required value="{{ $animal_doenca->data_inicio }}">
                        </div>
                        <div class="form-group">
                            <label for="data_cura">Cura:</label>
                            <input type="date" name="data_cura" class="form-control" value="{{ $animal_doenca->data_cura }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Gravar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
