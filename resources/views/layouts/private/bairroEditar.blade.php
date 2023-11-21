<div class="row container">
    <h2>Editar Ingrediente</h2>
    <form action="{{ route('bairro.update', $bairro->id_bairro) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row" style="margin-top: 50px;">
            <div class="input-field">
                <input type="text" name="nome_bairro" id="nome_bairro" value="{{ $bairro->nome_bairro }}" required>
                <label for="nome_bairro"></label>
            </div>
        </div>
        <div class="btn-group">
            <button class="btn-edit" type="submit">Salvar Alterações</button>
        </div>
    </form>
</div>