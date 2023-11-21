<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="{{ asset('css/private/layoutprivado.css') }}">
</head>

<body>

    <div class="left-top">
        @extends('\layouts\privado\layoutMenuPerfilPrivado')
    </div id='larguraSobra'>

    <div class="right-top">
        <div class="linha" class="superior">
            <div class="title">RUAS</div>
        </div>

        <div class="linha">


            <div class="meio-esquerdo">
                <select class="dropdown">
                    <option value="opcao1">ID</option>
                    <option value="opcao2">Nome</option>
                </select>
                <input type="text" class="search-bar" placeholder="Pesquisa">
                <button class="button">Pesquisar</button>
            </div>
            <div class="meio-direito">
                <button class="button">Excluir</button>
                <button class="button">Editar</button>
                <button class="button" id="btnCadastrar">Adicionar</button>
            </div>

        </div>

        <div class="linha" class="inferior">
            <button class="button">Pesquisa Avançada</button>
            <button class="button">Bairros</button>
            <button class="button">Ruas</button>
        </div>
    </div>

    <div class="left-bottom">
        @extends('\layouts\privado\layoutMenuPrivado')
    </div>

    <div class="right-bottom">
        <div class="row container">
            <table class="table">
                <thead>
                    <tr class="table-menu">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>ID Bairro</th>
                        <th>Bairro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruas as $rua)
                    <tr>
                        <td>{{ $rua->id_rua }}</td>
                        <td>{{ $rua->nome_rua }}</td>
                        <td>{{ $rua->bairro->id_bairro }}</td>
                        <td>{{ $rua->bairro->nome_bairro }}</td>
                        <td>

                            <a href="{{ route('ruas.edit', ['id_rua' => $rua->id_rua]) }}" class="btn-edit">Editar</a>

                            <button class="btn-delete" type="button" onclick="event.preventDefault(); if(confirm('Deseja realmente excluir esta rua?')) { document.getElementById('delete-form-{{ $rua->id_rua }}').submit(); }">
                                Excluir
                            </button>

                            <form id="delete-form-{{ $rua->id_rua }}" action="{{ route('rua.destroy', ['id_rua' => $rua->id_rua]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </button>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        <div class="overlay" id="overlay"></div>

        <!-- Modal de Cadastro de Rua (inicialmente oculto) -->
        <div id="modalCadastrar" style="display: none;">
            <button id="btnFecharModal">X</button>
            <h2>Cadastrar Rua</h2>
            <form method="POST" action="{{ route('rua.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Campos para o cadastro de rua -->
                <div class="input-field col s6">

                <span>Nome: </span>
                <input name="nome_rua" placeholder="Nome Rua" class="validate" type="text" id="nome_rua" required >
                <label for="nome_rua"></label>
                </div>

                <div class="input-field col s6">

                    <span>Bairro: </span>
                    <input name="nome_bairro" placeholder="Nome Bairro" class="validate" type="text" id="nome_bairro" required >
                    <label for="nome_bairro"></label>
                    </div>
                <!-- Outros campos -->

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <button id="btnGravarModal" type="submit" name="action">Cadastrar</button>

            </form>

            <!-- Botão para fechar o modal -->

        </div>

        <!-- Script para abrir e fechar o modal -->
        <script>
            const btnCadastrar = document.getElementById('btnCadastrar');
            const modalCadastrar = document.getElementById('modalCadastrar');
            const btnFecharModal = document.getElementById('btnFecharModal');
            const btnGravarModal = document.getElementById('btnGravarModal');
            const nomeBairroInput = document.getElementById('nome_bairro');
            const bairroNaoCadastrado = document.getElementById('bairroNaoCadastrado');

            btnCadastrar.addEventListener('click', () => {
                modalCadastrar.style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            });

            btnFecharModal.addEventListener('click', () => {
                modalCadastrar.style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            });

            btnGravarModal.addEventListener('click', () => {
                const nomeBairro = nomeBairroInput.value.trim();

                if (nomeBairro === '') {
                    bairroNaoCadastrado.style.display = 'block';
                } else {
                    // Aqui você pode enviar o formulário se o nome do bairro não estiver vazio
                    bairroNaoCadastrado.style.display = 'none';
                    document.getElementById('form').submit(); // Certifique-se de dar um id ao seu formulário
                }
            });
        </script>


</body>
</html>
