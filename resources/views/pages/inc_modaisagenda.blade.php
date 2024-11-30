<!--Modal Editar Agenda-->
<div class="modal fade" id="editaAgenda" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action=".<?php echo $_SERVER['SCRIPT_NAME'];?>?acao=editar<?php echo strlen($_SERVER['QUERY_STRING']) ? '&'. $_SERVER['QUERY_STRING'] : ''; ?>">
        <div class="modal-body">
        <div class="row">
            <div class="col-10 mb-3">
              <label for="nome" class="col-form-label">Nome</label>
              <input type="text" name="nome" class="form-control" id="editar_nome" oninvalid="this.setCustomValidity('Insira um nome para o cliente.')" oninput="setCustomValidity('')" required>
            </div>
            <div class="col-2 mt-5">
              <div class="form-check form-switch">
                <input class="form-check-input" name='ativo' value='1' type="checkbox" role="switch" id="switchativo">
              </div>
            </div>
          </div>
  
          <div class="row">  
            <div class="col-md-8 mb-3">
              <label for="cidade" class="col-form-label">Endereço</label>
              <input type="text" name="endereco" class="form-control" id="editar_endereco" >
            </div>
            <div class="col-md-4 mb-3">
              <label for="cidade" class="col-form-label">Telefone</label>
              <input type="text" name="telefone" class="form-control" id="editar_telefone" >
            </div>
          </div>
  
          <div class="row">  
            <div class="col mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
              <textarea class="form-control" rows="3" name="obs" id="editar_obs"></textarea>
            </div>
          </div>
  
          <hr>
  
          <h6>Pet</h6>
          
          <div class="container text-center mb-3">
  
            <div class="d-flex flex-row" id='comp_pet'></div>
            
          </div>
  
          <div>
        </div>
  
        <div class="modal-footer d-flex justify-content-between">
          <div><a class="btn btn-danger btn-sm" id="deletarcliente" name="" data-idcliente=""><i class="fa-solid fa-trash"></i> Apagar</a></div>
          <div>
            <input type="hidden" name="editar_id" id="editar_id" value="">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" value="enviar" class="btn btn-secondary">Salvar</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>