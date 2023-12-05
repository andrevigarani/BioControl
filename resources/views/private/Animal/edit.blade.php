@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">EDITAR ANIMAL</h3>
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

                    <form action="{{ route('user.animais.update', $animal->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $animal->nome }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nascimento">Nascimento:</label>
                            <input type="date" name="nascimento" class="form-control" value="{{ $animal->nascimento }}" required>
                        </div>
                        <div class="form-group">
                            <label for="falecimento">Falecimento:</label>
                            <input type="date" name="falecimento" class="form-control" value="{{ $animal->falecimento }}">
                        </div>
                        <div class="form-group">
                            <label for="castracao">Castração:</label>
                            <input type="date" name="castracao" class="form-control" value="{{ $animal->castracao }}">
                        </div>
                        <div class="form-group">
                            <label for="id_responsavel_animal">Responsável:</label>
                            <select name="id_responsavel_animal" class="form-control" required>
                                @foreach($pessoafisicas as $pessoafisica)
                                    <option value="{{ $pessoafisica->id }}" {{ $animal->id_responsavel_animal == $pessoafisica->id ? 'selected' : '' }}>
                                        {{ $pessoafisica->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Gravar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
