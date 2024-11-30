<!--Modal Editar Cliente -->
<div class="modal fade" id="editaCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST"
          action=".<?php echo $_SERVER['SCRIPT_NAME']; ?>?acao=editar<?php echo strlen($_SERVER['QUERY_STRING']) ? '&' . $_SERVER['QUERY_STRING'] : ''; ?>">
          <div class="modal-body">
            <div class="row">
              <div class="col-10 mb-3">
                <label for="nome" class="col-form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="editar_nome"
                  oninvalid="this.setCustomValidity('Insira um nome para o cliente.')" oninput="setCustomValidity('')"
                  required>
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
                <input type="text" name="endereco" class="form-control" id="editar_endereco">
              </div>
              <div class="col-md-4 mb-3">
                <label for="cidade" class="col-form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="editar_telefone">
              </div>
            </div>
  
            <div class="row">
              <div class="col mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
                <textarea class="form-control" rows="3" name="obs" id="editar_obs"></textarea>
              </div>
            </div>
            <div class="row">
              <label for="cidade" class="col-form-label">Dia do Banho</label>
              <div class="col mb-3 d-flex justify-content-between">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="diabanho1" value="1" name='diabanho' required>
                  <label class="form-check-label" for="inlineCheckbox1">Segunda</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="diabanho2" value="2" name='diabanho'>
                  <label class="form-check-label" for="inlineCheckbox1">Terça</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="diabanho3" value="3" name='diabanho'>
                  <label class="form-check-label" for="inlineCheckbox1">Quarta</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="diabanho4" value="4" name='diabanho'>
                  <label class="form-check-label" for="inlineCheckbox1">Quinta</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="diabanho5" value="5" name='diabanho'>
                  <label class="form-check-label" for="inlineCheckbox1">Sexta</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="diabanho6" value="6" name='diabanho'>
                  <label class="form-check-label" for="inlineCheckbox1">Sábado</label>
                </div>
  
              </div>
            </div>
            <hr>
  
            <h6>Pet</h6>
  
            <div class="container text-center mb-3">
              <div class="d-flex flex-row" id='comp_pet'></div>
            </div>
  
            <div class="modal-footer d-flex justify-content-between">
              <div><a class="btn btn-danger btn-sm" id="deletarcliente" name="" data-idcliente="">
                  <i class="fa-solid fa-trash"></i> Apagar</a>
              </div>
              <div>
                <input type="hidden" name="editar_id" id="editar_id" value="">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" value="enviar" class="btn btn-secondary">Salvar</button>
              </div>
            </div>
  
          </div>
      </div>
      </form>
  
    </div>
  </div>
  </div>
  
  <!--Modal Cadastrar Item -->
  <div class="modal fade" id="cadastraItem" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Ítem</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--Content-->
          <form action="./cliente.php?acao=additem&id=<?php echo $id;?>" method="post" autocomplete="off">
            
            <div class="row">
              <div class="col-6">
                <h5 id="it_nome">Nome Animal</h5>
                <div id='it_obs' name='obs'>Observacao</div>
                <hr>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                  <input type="text" class="form-control" id="it_descricao" name="descricao" placeholder="" oninvalid="this.setCustomValidity('Insira uma descrição para o produto.')" oninput="setCustomValidity('')" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Valor</label>
                  <input type="number" class="form-control" id="it_valor" name="valor" placeholder="" oninvalid="this.setCustomValidity('Insira um valor do ítem.')" step="0.01" required oninput="setCustomValidity('');">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Pagamento Parcial</label>
                  <input type="number" class="form-control" id="it_pagamentoparcial" name="pagamentoparcial" placeholder="">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Data</label>
                <div class="group">
                  <input type="text" id="calitem" name='data' class="d-none">
                </div>
                </div>
              </div>
            </div>
  
          <!--Content-->
        </div>
        <div class="modal-footer">
          <input type="hidden" id='it_idcliente' name="idcliente">
          <input type="hidden" id='it_idpet' name="idpet">
  
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" value="enviar">Adicionar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!--Modal Add Pet -->
  <div class="modal fade" id="adicionarPet" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header" stype>
          <h5 class="modal-title">Adicionar Pet</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <h5 class="d-flex justify-content-between">Pet <button type="button" class="btn btn-primary btn-sm" id="addpetCli">+</button></h5>
        <!--Content-->
        <form action="./cliente.php?acao=addpet&id=<?php echo $id;?>" method="post" autocomplete="off">
            
        <div class="row" id="formpetCli">
          <div class="col-md-4 mb-1">
            <label for="nome" class="col-form-label">Nome</label>
            <input type="text" name="nomepet[]" class="form-control" id="nomepetcli">
          </div>
          <div class="col-md-2 mb-1">
            <label for="valorpacote" class="col-form-label">Valor Pacote</label>
            <input type="text" name="valorpacote[]" class="form-control" id="valorpacotecli" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
          </div>
          <div class="col-md-2 mb-1">
            <label for="frequencia" class="col-form-label">Frequência</label>
            <select class="form-select" aria-label="Default select example" name="frequencia[]" id="frequenciacli">
              <option value="-"></option>
                <option value="7">Semanal (7/7)</option>
                <option value="15">Quinzenal (15/15)</option>
                <option value="30">Mensal (30/30)</option>
            </select>
          </div>
          <div class="col-md-2 mb-1">
            <label for="raca" class="col-form-label">Raça</label>
            <select class="form-select" aria-label="Default select example" name="raca[]" id="racapetcli">
              <option value="-"></option>
                <option value="Shih-tzu">Shih-tzu</option>
                <option value="Yorkshire">Yorkshire</option>
                <option value="Spitz">Spitz</option>
                <option value="Poodle">Poodle</option>
                <option value="Pinscher">Pinscher</option>
                <option value="SRD">SRD</option>
                <option value="Outro">Outro</option>
            </select>
          </div>
          <div class="col-md-2 mb-1">
            <label for="taxidog" class="col-form-label">Taxidog</label>
            <div class="form-check form-switch">
              <input class="form-check-input mt-2" name='taxidog[]' value='1' type="checkbox" role="switch" id="switchtaxidogcli">
            </div>
          </div>
        </div>
          
        <!--Content-->
        </div>
        <div class="modal-footer">
          <input type="hidden" id='ed_idcliente' name="idcliente">
          <input type="hidden" id='ed_idpet' name="idpet">
          <input type="hidden" id='ed_iditem' name="iditem">
  
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" value="enviar">Salvar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!--Modal Editar Pet -->
  <div class="modal fade" id="editarPet" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header" stype>
          <h5 class="modal-title">Editar Pet</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="height: 300px;">
        <h5 class="d-flex justify-content-between">Pet</h5>
        <!--Content-->
        <form action="./cliente.php?acao=editarpet&id=<?php echo $id;?>" method="post">
            
        <div class="row" id="formpetCli">  
          <div class="col-md-4 mb-1">
            <label for="nome" class="col-form-label">Nome</label>
            <input type="text" name="nomepet" class="form-control" id="edpet_nomepet">
          </div>
          <div class="col-md-2 mb-1">
            <label for="valorpacote" class="col-form-label">Valor Pacote</label>
            <input type="text" name="valorpacote" class="form-control" id="edpet_valorpacote" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
          </div>
          <div class="col-md-2 mb-1">
            <label for="frequencia" class="col-form-label">Frequência</label>
            <select class="form-select" aria-label="Default select example" name="frequencia" id="edpet_frequencia">
              <option value="-"></option>
                <option value="7">Semanal (7/7)</option>
                <option value="15">Quinzenal (15/15)</option>
                <option value="30">Mensal (30/30)</option>
            </select>
          </div>
          <div class="col-md-2 mb-1">
            <label for="raca" class="col-form-label">Raça</label>
            <select class="form-select" aria-label="Default select example" name="raca" id="edpet_raca">
              <option value="-"></option>
                <option value="Shih-tzu">Shih-tzu</option>
                <option value="Yorkshire">Yorkshire</option>
                <option value="Spitz">Spitz</option>
                <option value="Poodle">Poodle</option>
                <option value="Pinscher">Pinscher</option>
                <option value="SRD">SRD</option>
                <option value="Outro">Outro</option>
            </select>
          </div>
          <div class="col-md-2 mb-1">
            <label for="taxidog" class="col-form-label">Taxidog</label>
            <div class="form-check form-switch">
              <input class="form-check-input mt-2" name='taxidog' value='1' type="checkbox" role="switch" id="switchtaxidog">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="observacao" class="col-form-label">Observação</label>
            <textarea class="form-control" rows="3" name="observacao" id="edpet_observacao"></textarea>
          </div>
        </div>
          
        <!--Content-->
        </div>
        <div class="modal-footer">
          <input type="hidden" id='edpet_idcliente' name="idcliente">
          <input type="hidden" id='edpet_idpet' name="idpet">
          <input type="hidden" id='edpet_retorno' name="retorno" value="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" value="enviar">Salvar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!--Modal Editar Item -->
  <div class="modal fade" id="editaItem" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Ítem</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!--Content-->
        <form action="./cliente.php?acao=editaritem&id=<?php echo $id;?>" method="post">
            
            <div class="row">
              <div class="col-6">
                <h5 id="ed_nome">Nome Animal</h5>
                <div id='ed_obs' name='obs'>Observacao</div>
                <hr>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                  <input type="text" class="form-control" id="ed_descricao" name="descricao" placeholder="" oninvalid="this.setCustomValidity('Insira uma descrição para o produto.')" oninput="setCustomValidity('')" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Valor</label>
                  <input type="number" class="form-control" id="ed_valor" name="valor" placeholder="" oninvalid="this.setCustomValidity('Insira um valor do ítem.')" step="0.01" required oninput="setCustomValidity('');">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Pagamento Parcial</label>
                  <input type="number" class="form-control" id="ed_pagamentoparcial" name="pagamentoparcial" placeholder="">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                    <div class="group">
                      <input type="text" id="calitemedit" name='calendario' class="d-none">
                    </div>
                </div>
              </div>
            </div>
        <!--Content-->
        </div>
        <div class="modal-footer">
          <input type="hidden" id='edx_idcliente' name="idcliente">
          <input type="hidden" id='edx_idpet' name="idpet">
          <input type="hidden" id='edx_iditem' name="iditem">
  
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" value="enviar">Salvar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  