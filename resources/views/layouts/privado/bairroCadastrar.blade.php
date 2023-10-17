<div class="row container">
    <form action="{{route('bairro.store')}} " method="POST" enctype="multipart/form-data" class="col s12">
    @csrf
    <div class="row" style="margin-top: 50px;">
        <div class="input-field col s6">
          <input name="nome_bairro" placeholder="Nome Cadastro" id="nome_bairro" type="text" class="validate">
          <span>Nome</span>
          <label for="nome_bairro"></label>
        </div>
    </div> 
    <button class="btn waves-effect waves-light" style="margin-top: 150px;" type="submit" name="action">Cadastrar</button>
    </form>
    
  </div>