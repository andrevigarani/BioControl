@extends('layouts.private.app')

@section('content')

    <div class="private-header">
        <h3 class="text-center">EDITAR PESSOA JURÍDICA</h3>
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

                    <form action="{{ route('user.pessoa_juridicas.update', $pessoaJuridica->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" value="{{ $pessoaJuridica->cnpj }}" required>
                        </div>
                        <div class="form-group">
                            <label for="razao_social">Razão Social:</label>
                            <input type="text" class="form-control" name="razao_social" value="{{ $pessoaJuridica->razao_social }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nome_fantasia">Nome Fantasia:</label>
                            <input type="text" class="form-control" name="nome_fantasia" value="{{ $pessoaJuridica->nome_fantasia }}">
                        </div>
                        <div class="form-group">
                            <label for="fone">Telefone:</label>
                            <input type="text" class="form-control" name="fone" value="{{ $pessoaJuridica->fone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $pessoaJuridica->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_endereco">Número Endereço:</label>
                            <input type="text" class="form-control" name="numero_endereco" value="{{ $pessoaJuridica->numero_endereco }}">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" name="complemento" value="{{ $pessoaJuridica->complemento }}">
                        </div>
                        <div class="form-group">
                            <label for="id_rua">ID Rua:</label>
                            <input type="text" class="form-control" name="id_rua" value="{{ $pessoaJuridica->id_rua }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Gravar Pessoa Jurídica</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
