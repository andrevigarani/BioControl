@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">EDITAR DOENÇA</h3>
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

                    <form action="{{ route('user.doencas.update', $doenca->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" required value="{{ $doenca->nome }}">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <input type="text" name="descricao" class="form-control" required value="{{ $doenca->descricao }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Gravar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
