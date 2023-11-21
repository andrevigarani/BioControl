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
            <div class="title">BAIRROS</div>
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bairros as $bairro)
                    <tr>
                        <td>{{ $bairro->id_bairro }}</td>
                        <td>{{ $bairro->nome_bairro }}</td>
                        <td>

                            <a href="{{ route('bairros.edit', ['id_bairro' => $bairro->id_bairro]) }}" class="btn-edit">Editar</a>

                                <button class="btn-delete" type="button" onclick="event.preventDefault(); if(confirm('Deseja realmente excluir este bairro?')) { document.getElementById('delete-form-{{ $bairro->id_bairro }}').submit(); }">
                                    Excluir
                                </button>

                                <form id="delete-form-{{ $bairro->id_bairro }}" action="{{ route('bairro.destroy', ['id_bairro' => $bairro->id_bairro]) }}" method="POST" style="display: none;">
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

        <!-- Modal de Cadastro de Bairro (inicialmente oculto) -->
        <div id="modalCadastrar" style="display: none;">
            <button id="btnFecharModal">X</button>
            <h2>Cadastrar Bairro</h2>
            <form method="POST" action="{{ route('bairro.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Campos para o cadastro de bairro -->
                <div class="input-field col s6">

                    <select name="id_estado" id="id_estado">
                        <option value="">Selecione um estado</option>
                        @foreach ($estados as $id_estado => $nome_estado)
                            <option value="{{ $id_estado }}">{{ $nome_estado }}</option>
                        @endforeach
                    </select>

                    <select name="id_municipio" id="id_municipio">
                        <option value="">Selecione um município</option>
                    </select>

                <span>Bairro: </span>
                <input name="nome_bairro" placeholder="Nome Bairro" class="validate" type="text" id="nome_bairro" required >
                <label for="nome_bairro"></label>
                </div>
                <!-- Outros campos -->

                <button id="btnGravarModal" type="submit" name="action">Cadastrar</button>
            </form>

            <!-- Botão para fechar o modal -->

        </div>

        <!-- Script para abrir e fechar o modal -->
        <script>
            const btnCadastrar = document.getElementById('btnCadastrar');
            const modalCadastrar = document.getElementById('modalCadastrar');
            const btnFecharModal = document.getElementById('btnFecharModal');

            btnCadastrar.addEventListener('click', () => {
                modalCadastrar.style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            });

            btnFecharModal.addEventListener('click', () => {
                modalCadastrar.style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            });

        </script>

<script>
    document.getElementById('id_estado').addEventListener('change', function() {
        var selectedEstadoId = this.value;
        var municipioDropdown = document.getElementById('id_municipio');

        // Limpe o dropdown de municípios
        municipioDropdown.innerHTML = '<option value="">Selecione um município</option>';

        if (selectedEstadoId) {
            // Preencha o dropdown de municípios com base no estado selecionado
            @foreach ($municipios as $municipio)
                if ({{ $municipio->id_estado }} == selectedEstadoId) {
                    var option = document.createElement('option');
                    option.value = {{ $municipio->id_municipio }};
                    option.textContent = "{{ $municipio->nome_municipios }}";
                    municipioDropdown.appendChild(option);
                }
            @endforeach
        }
    });
</script>



</body>
</html>
