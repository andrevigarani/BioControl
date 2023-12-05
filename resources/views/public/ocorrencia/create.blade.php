@extends('layouts.public.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light p-5" style="--bs-bg-opacity: 0.85">

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

                    <form action="{{ route('ocorrencias.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <select name="tipo" class="form-control">
                                <option value="D">Denúncia</option>
                                <option value="S">Sugestão</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" name="endereco" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea type="text" name="descricao" class="form-control " style="height: 120px; resize: none"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
