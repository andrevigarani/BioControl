@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">NOVA CLÍNICA VETERINÁRIA</h3>
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

                    <form action="{{ route('user.clinicasVeterinarias.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="pessoa_juridica">Pessoa Jurídica:</label>
                            <select class="form-control" name="pessoa_juridica" required>
                                <option value="" disabled selected>Escolha uma Pessoa Jurídica</option>
                                @foreach ($pessoasJuridicas as $pessoaJuridica)
                                    <option value="{{ $pessoaJuridica->id }}">{{ $pessoaJuridica->razao_social }} (CNPJ: {{ $pessoaJuridica->cnpj }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
