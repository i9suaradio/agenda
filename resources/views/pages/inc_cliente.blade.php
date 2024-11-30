<?php

//Selects
$restabPets = DB::query("SELECT * FROM pets where idcliente = %i order by nome asc", $restabCliente[0]['id']);

$restabItensPets = DB::query("SELECT itens.*, pets.nome, pets.observacao FROM itens inner join pets on pets.id = itens.idpet where itens.idcliente = %i and arquivado = 0 order by data asc , idpet asc", $restabCliente[0]['id'] );


?>
<main class="col ms-sm-auto overflow-visible">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cliente</h1>
    <div class="btn-toolbar mb-2 mb-md-0 ">
      <div class="btn-group me-2 d-none">
        <button type="button" class="btn btn-sm btn-primary">Share</button>
        <button type="button" class="btn btn-sm btn-primary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-primary dropdown-toggle">
        <span data-feather="calendar" class="align-text-bottom"></span>
        Agendar Banhos
      </button>
    </div>
  </div>

  <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
  <div class="card">
    <div class="card-body" style="z-index: 1000">
      <div class="position-absolute top-0 end-0 translate-middle mt-5">
                
        <div class="dropdown">
          <button class="btn btn-info btn-sm me-1 dropdown-toggle me-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-bars"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" type="button" id="editarcliente" name="<?php echo $restabCliente[0]['id']?>" data-idcliente="<?php echo $restabCliente[0]['id']?>" data-bs-toggle="modal" data-bs-target="#editaCliente"><i class="fa-solid fa-pen-to-square me-1"></i> Editar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" type="button" id="add_pet" name="<?php echo $restabCliente[0]['id']?>" data-idcliente="<?php echo $restabCliente[0]['id']?>" data-bs-toggle="modal" data-bs-target="#adicionarPet"><i class="fa-solid fa-dog me-1"></i> Adicionar Pet</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" type="button" id="editarcliente" name="<?php echo $restabCliente[0]['id']?>" data-idcliente="<?php echo $restabCliente[0]['id']?>" data-bs-toggle="modal" data-bs-target="#editaCliente"><i class="fa-solid fa-trash me-1" style="color: red"></i> Remover Cliente</a></li>            
          </ul>
        </div>

      </div>
      <h5 class="card-title"><?php echo $restabCliente[0]['nome']?></h5>
      <?php
      switch ($restabCliente[0]['diabanho']) {
        case 1:
          $diabanho = 'Segunda-Feira';
          break;
        case 2:
          $diabanho = 'Terça-Feira';
          break;
        case 3:
          $diabanho = 'Quarta-Feira';
          break;
        case 4:
          $diabanho = 'Quinta-Feira';
          break;
        case 5:
          $diabanho = 'Sexta-Feira';
          break;
        case 6:
          $diabanho = 'Sábado';
          break;
        default:
          # code...
          break;
      }
      ?>
      <h6 class="card-subtitle mb-2 text-body-secondary"><small><?php echo $diabanho;?></small></h6>
      <p class="card-text lh-sm">Endereço: <?php echo $restabCliente[0]['endereco']?></p>
      <p class="card-text lh-sm">Telefone: <?php echo $restabCliente[0]['telefone']?>
        <?php           
          if(substr($restabCliente[0]['telefone'], 0,1)=='9'){
            $find = array(" ","-");
            $telefonewhats = str_replace($find, '', $restabCliente[0]['telefone']);
            if(strlen($telefonewhats)==9) {
              echo "<a href='https://wa.me/5534" . str_replace($find, '', $restabCliente[0]['telefone']) . "' target='_blank'><i class='fa-brands fa-whatsapp'></i></a>";
            }
          }
          ?>

      </p>
      <p class="card-text lh-sm">Observações: <?php echo $restabCliente[0]['obs']?></p>
    </div>
  </div>

  <hr>

  <div class="mt-4">
    <div class="row">
      <?php
      foreach ($restabPets as $tabPet){
      ?>

      <div class="col">
        <div class="shadow card mb-4 vh-auto" style="width: 18rem;" id='cardpet' name='<?php echo $tabPet['id']?>'>

          <!--Doguinho-->
          <div class="position-absolute top-0 start-0 translate-middle" style="width: 20px; height: 20px;"
            data-bs-toggle="dropdown" aria-expanded="false">
            <a class="fa-solid fa-dog fa-2xl hover-rotate" id='doguinho' name='doguinho<?php echo $tabPet['id']?>'
              style="color: #05816d"></a>
          </div>
          <div class="btn-group dropstart">
            <ul class="dropdown-menu">

              <li>
                <a class="dropdown-item" id="agendabanho" name="<?php echo $tabPet['id']?>"
                  data-idcliente="<?php echo $restabCliente[0]['id']?>"
                  data-idpet="<?php echo $tabPet['id']?>"
                  data-nomepet="<?php echo $tabPet['nome']?>"
                  data-valorpacote="<?php echo $tabPet['valorpacote']?>"
                  data-obs="<?php echo $tabPet['observacao']?>"
                  data-diabanho="<?php echo $restabCliente[0]['diabanho']?>"
                  data-frequencia="<?php echo $tabPet['frequencia']?>"
                  data-bs-toggle="modal"
                  data-bs-target="#agendaBanho">
                  <i class='fa-solid fa-shower me-2'></i>Agendar Banho/Tosa</a>
              </li>

              <li><a class="dropdown-item" id="additem"
                name="<?php echo $tabPet['id']?>"
                data-idcliente="<?php echo $restabCliente[0]['id']?>"
                data-idpet="<?php echo $tabPet['id']?>"
                data-nome="<?php echo $tabPet['nome']?>"
                data-valorpacote="<?php echo $tabPet['valorpacote']?>"
                data-obs="<?php echo $tabPet['observacao']?>"
                data-diabanho="<?php echo $restabCliente[0]['diabanho']?>"
                data-frequencia="<?php echo $tabPet['frequencia']?>"
                data-bs-toggle="modal"
                data-bs-target="#cadastraItem">
                <i class='fa-solid fa-plus me-2'></i>Adicionar Item</a></li>
              <li><a class="dropdown-item" id="editarpet"
              name="<?php echo $tabPet['id']?>"
                data-idcliente="<?php echo $restabCliente[0]['id']?>"
                data-idpet="<?php echo $tabPet['id']?>"
                data-nome="<?php echo $tabPet['nome']?>"
                data-valorpacote="<?php echo $tabPet['valorpacote']?>"
                data-obs="<?php echo $tabPet['observacao']?>"
                data-diabanho="<?php echo $restabCliente[0]['diabanho']?>"
                data-frequencia="<?php echo $tabPet['frequencia']?>"
                data-bs-toggle="modal"
                data-bs-target="#editarPet"><i class="fa-solid fa-pen-to-square me-2"></i>Editar</a></li>
              <li><a class="dropdown-item text-danger" href="#" id="deletarpet" name="<?php echo $id;?>" data-idpet="<?php echo $tabPet['id']?>"><i class='fa-solid fa-trash me-2'></i>Excluir</a></li>
            </ul>
          </div>

          <?php $restabItensPetsPorPet = DB::query("SELECT * FROM itens where idpet = %i and idcliente = %i and pago = 0", $tabPet['id'], $restabCliente[0]['id'] ); ?>
          <div class="card-body">

            <div>
              <h3 class="card-title text-center position-relative"><a href="#" class="" data-bs-container="body"
                  data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top"
                  data-bs-content="Top popover"><?php echo $tabPet['nome'] ?></a></h3>
              <span
                class="position-absolute top-0 start-100 p-1 translate-middle bg-dark border border-light rounded-circle badge rounded-pill  fw-lighter">
                <span class="fs-6"><?php echo $tabPet['frequencia'] ?>/<?php echo $tabPet['frequencia'] ?></span>
              </span>
            </div>

            <p class="card-text fs-6">R$ <?php echo $tabPet['valorpacote']; ?> <?php echo $tabPet['taxidog'] ? 'com Taxi Dog' : ''; ?></p>
            <p class="card-text fs-6 fw-lighter"><?php echo $tabPet['observacao']; ?></p>

            <div class="accordion accordion-flush fs-6" id="accordionFlushExample">

              <?php foreach ($restabItensPetsPorPet as $tabItensPets){ ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed fs-6" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne<?php echo $tabPet['id'] . '-' . $tabItensPets['id'];?>"
                    aria-expanded="false" aria-controls="flush-collapseOne">
                    <?php echo $tabItensPets['descricao']; ?>
                  </button>
                </h2>
                <div id="flush-collapseOne<?php echo $tabPet['id'] . '-' . $tabItensPets['id'];?>"
                  class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                  data-bs-parent="#accordionFlushExample<?php echo $tabPet['id'] . '-' . $tabItensPets['id'];?>">
                  <div class="accordion-body">
                    <div class="d-flex justify-content-between">
                      <div><?php echo formatadata($tabItensPets['data'])?></div>

                      <p class="fs-6"><?php echo formatamoeda($tabItensPets['valor']);?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>

            </div>

          </div>
        </div>
      </div>
      <?php }?>
    </div>

    <hr>

    <!---Agenda-->
    <!---Agenda-->
    <!---Agenda-->
    <!---Agenda-->
    <h5>Banho e Tosa</h5>
    <div class="table">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width: 10px"></th>
            <th>Pet</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Valor Serviço</th>
            <th>Data Pago</th>
            <th>Status</th>
            <th width="50px" class="">Ações</th>
          </tr>
        </thead>
      
        <tbody>
        <?php
          $totalAgendado = 0;
          $totalExecutado = 0;
          $totalPago = 0;
          $divisor = 0;
        
          foreach ($restabPets as $tabPet){
          
          $restabAgenda = DB::query("SELECT agenda.*, pets.nome, pets.observacao, pets.frequencia, pets.valorpacote FROM `agenda` inner join pets on pets.id = agenda.idpet and agenda.idcliente = %i where agenda.arquivado = 0 and agenda.idpet = %i order by nome asc, data asc , idpet asc", $restabCliente[0]['id'], $tabPet['id'] );
          ?>
          <tr>
            <td colspan="8" class="text-center table-light" style="margin: 0px !important; padding: 0px !important;"><h6 class="mt-2"><?php echo $tabPet['nome'];?></h6></td>
          </tr>
          <?php
          foreach ($restabAgenda as $tabAgenda){
              switch ($tabAgenda['frequencia']) {
                case 7:
                  $divisor = 4;
                  break;
                case 15:
                  $divisor = 2;
                  break;
                case 30:
                  $divisor = 1;
                  break;
              }
            ?>
          <tr id='linhaagenda<?php echo $tabAgenda['id'];?>'>
            <?php
            $servico =  $tabAgenda['servico']=='banho' ? 'btn-success' : "btn-info";
            
            switch ($tabAgenda['status']) {
              case 'agendado':
                $status = 'bg-warning';
                break;
              case 'executado':
                $status = 'bg-info';
                break;
              case 'pago':
                $status = 'bg-success';
                break;
              case 'cancelado':
                $status = 'bg-danger';
                break;
              case 'pago':
                $status = 'bg-success';
                break;
              default:
                $status = 'bg-primary';
                break;
            }
            ?>
            <th><i class="btn btn-sm <?php echo $servico; ?> rounded-pill" style="width: 1rem; height:1rem;"> </i></th>
            <td><?php echo $tabAgenda['nome'];?></td>
            <td><?php echo $tabAgenda['observacao'];?></td>
            <td><?php echo formatadata($tabAgenda['data'])?></td>
            <!-- <td><?php echo formatamoeda($tabAgenda['valorpacote'] / $divisor);?></td> -->
            <td><?php echo formatamoeda($tabAgenda['valor']);?></td>
            <td id="datapago<?php echo $tabAgenda['id'];?>"><?php echo formatadata($tabAgenda['datapago'])?></td>
            <td><div id="agenda<?php echo $tabAgenda['id'];?>" class="badge <?php echo $status; ?>" style="width: 75px;"><?php echo $tabAgenda['status'];?></div></td>
            <td class="d-flex justify-content-start">

              <div class="dropdown">
                <button class="btn btn-info btn-sm me-1 dropdown-toggle me-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
                <ul class="dropdown-menu">
                  <div class="d-none">
                  <li><a href="./cliente.php?acao=editaagenda&status=executado&idagenda=<?php echo $tabAgenda['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-regular fa-calendar-check me-1"></i> Executado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./cliente.php?acao=editaagenda&status=pago&idagenda=<?php echo $tabAgenda['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-solid fa-check me-1"></i> Pago</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./cliente.php?acao=editaagenda&status=agendado&idagenda=<?php echo $tabAgenda['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-regular fa-calendar me-1"></i> Agendado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./cliente.php?acao=editaagenda&status=cancelado&idagenda=<?php echo $tabAgenda['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-regular fa-calendar-xmark me-1"></i> Cancelado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./cliente.php?acao=editaagenda&status=arquivado&idagenda=<?php echo $tabAgenda['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-solid fa-book-skull me-1"></i> Arquivado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" type="button" id="deletaragenda" name="<?php echo $tabAgenda['id']?>" data-idagenda="<?php echo $tabAgenda['id']?>" data-idcliente="<?php echo $tabAgenda['idcliente']?>"><i class="fa-solid fa-trash me-1"></i> Apagar</a></li>

                  <li><hr class="dropdown-divider"></li>
                  </div>

                  <li>
                    <a id='status<?php echo $tabAgenda['id'];?>' 
                    class="dropdown-item"
                    data-idcliente="<?php echo $tabAgenda['idcliente'];?>"
                    data-idagenda="<?php echo $tabAgenda['id'];?>"
                    data-status="executado"
                    data-paginaorigem="cliente"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Executado</a></li>
                    <hr>
                  <li>
                    <a id='pagostatus<?php echo $tabAgenda['id'];?>' 
                    class="dropdown-item"
                    data-idcliente="<?php echo $tabAgenda['idcliente'];?>"
                    data-idagenda="<?php echo $tabAgenda['id'];?>"
                    data-status="pago"
                    data-paginaorigem="cliente"
                    data-bs-toggle="modal"
                    data-bs-target="#modalPago"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Pago</a></li>
                    <hr>
                  <li>
                    <a id='status<?php echo $tabAgenda['id'];?>' 
                    class="dropdown-item"
                    data-idcliente="<?php echo $tabAgenda['idcliente'];?>"
                    data-idagenda="<?php echo $tabAgenda['id'];?>"
                    data-status="agendado"
                    data-paginaorigem="cliente"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Agendado</a></li>
                    <hr>
                  <li>
                    <a id='status<?php echo $tabAgenda['id'];?>' 
                    class="dropdown-item"
                    data-idcliente="<?php echo $tabAgenda['idcliente'];?>"
                    data-idagenda="<?php echo $tabAgenda['id'];?>"
                    data-status="cancelado"
                    data-paginaorigem="cliente"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Cancelado</a></li>
                    <hr>
                  <li>
                    <a id='status<?php echo $tabAgenda['id'];?>' 
                    class="dropdown-item"
                    data-idcliente="<?php echo $tabAgenda['idcliente'];?>"
                    data-idagenda="<?php echo $tabAgenda['id'];?>"
                    data-status="arquivado"
                    data-paginaorigem="cliente"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Arquivado</a></li>
                    <hr>
                    <li><a class="dropdown-item text-danger" type="button" id="deletaragenda" name="<?php echo $tabAgenda['id']?>" data-idagenda="<?php echo $tabAgenda['id']?>" data-idcliente="<?php echo $tabAgenda['idcliente']?>" data-callback="nocallback"><i class="fa-solid fa-trash me-1"></i> Apagar</a></li>

                </ul>
              </div>

            </td>
          </tr>
          
          <?php 
            $tabAgenda['status']=='agendado' ? $totalAgendado += $tabAgenda['valor'] : $totalAgendado += 0;
            $tabAgenda['status']=='executado' ? $totalExecutado += $tabAgenda['valor'] : $totalExecutado += 0;
            $tabAgenda['status']=='pago' ? $totalPago += $tabAgenda['valor'] : $totalPago += 0;
            
            }
            ?>
        </tbody>

        <?php if(!$restabAgenda){?>
        <tbody>
          <tr>
            <td colspan="8" class="text-center">Nenhum item para ser exibido.</td>
          </tr>
        </tbody>
        <?php }?>
          <!---final---->
          <?}?>
          
      
        </tbody>
        

        <tfoot>
          <tr>
            <td colspan="8" class="text-end fw-semibold table-success">Total Pago: <i id='totalpago'><?php echo formatamoeda($totalPago);?></i>
          </td>
          <tr>
            <td colspan="8" class="text-end fw-semibold table-info">Total Executado: <i id='totalexecutado'><?php echo formatamoeda($totalExecutado);?></i>
          </td>
          <tr>
            <td colspan="8" class="text-end fw-semibold table-warning">Total Agendado: <i id='totalagendado'><?php echo formatamoeda($totalAgendado);?></i>
          </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!---Agenda-->
    <!---Agenda-->
    <!---Agenda-->
    <!---Agenda-->


    <!--Itens-->
    <h5>Itens</h5>
    <div class="table">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Pet</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Pg. Parcial</th>
            <th>Data</th>
            <th>Pago</th>
            <th></th>
            <th width="50px">Ações</th>
          </tr>
        </thead>

        <tbody>
          <?php
            $totalItens = 0;
            $pagoItens = 0;

            foreach ($restabItensPets as $tabItensPets){
              
            
            switch ($tabItensPets['pago']) {
              case '0':
                $statusitem = 'bg-warning';
                break;
              case '1':
                $statusitem = 'bg-success';
                break;
              default:
                $statusitem = 'bg-primary';
                break;
            }
            
            ?>
          <tr>
            <th><?php echo $tabItensPets['id'];?></th>
            <td><?php echo $tabItensPets['nome'];?></td>
            <td><?php echo $tabItensPets['descricao'];?></td>
            <td><?php echo formatamoeda($tabItensPets['valor']);?></td>
            <td><?php echo formatamoeda($tabItensPets['pagamentoparcial']);?></td>
            <td><?php echo formatadata($tabItensPets['data']);?></td>
            <td><?php echo formatadata($tabItensPets['datapago']);?></td>
            <td><div class="badge <?php echo $statusitem; ?>" style="width: 75px;"><?php echo $tabItensPets['pago']==1 ? 'pago' : 'aberto';?></div></td>
            <td class="d-flex justify-content-start">
            <div class="dropdown">
                <button class="btn btn-info btn-sm me-1 dropdown-toggle me-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" type="button" id="editaritem"
                  data-iditem="<?php echo $tabItensPets['id']?>"
                  data-idpet="<?php echo $tabItensPets['idpet']?>"
                  data-idcliente="<?php echo $restabCliente[0]['id'];?>"
                  data-nome="<?php echo $tabItensPets['nome'];?>"
                  data-obs="<?php echo $tabItensPets['observacao'];?>"
                  data-descricao="<?php echo $tabItensPets['descricao'];?>"
                  data-valor="<?php echo $tabItensPets['valor'];?>"
                  data-pagamentoparcial="<?php echo $tabItensPets['pagamentoparcial'];?>"
                  data-data="<?php echo $tabItensPets['data'];?>"
                  data-bs-toggle="modal"
                  data-bs-target="#editaItem" ><i class="fa-solid fa-pen-to-square"></i> Editar</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./cliente.php?acao=editaitem&status=pago&iditem=<?php echo $tabItensPets['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-solid fa-check me-1"></i> Pago</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./cliente.php?acao=editaitem&status=arquivado&iditem=<?php echo $tabItensPets['id'];?>&id=<?php echo $restabCliente[0]['id'];?>" class="dropdown-item" type="button"><i class="fa-solid fa-book-skull me-1"></i> Arquivado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" type="button" id="deletaritem" name="<?php echo $tabItensPets['id']?>" data-idcliente="<?php echo $id; ?>" data-idcliente="<?php echo $tabItensPets['idcliente']?>"><i class="fa-solid fa-trash"></i> Apagar</a></li>
                </ul>
            </div>
            </td>
          </tr>
          <?php 
            $totalItens += $tabItensPets['valor'];
            $pagoItens +=  $tabItensPets['pagamentoparcial'];
            }
            ?>
        </tbody>

        <?php if(!$restabItensPets){?>
        <tbody>
          <tr>
            <td colspan="8" class="text-center">Nenhum item para ser exibido.</td>
          </tr>
        </tbody>
        <?php }?>

        <tfoot>
          <tr>
            <td colspan="8" class="text-end">Pgt. Parcial <i id='pagoparcial'><?php echo formatamoeda($pagoItens);?></i></td>
          </tr>
          <tr>
            <td colspan="8" class="text-end fw-semibold">Total Itens <i id='totalitens'><?php echo formatamoeda($totalItens-$pagoItens);?></i>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Itens-->

  </div>
</main>

<!-- Modal Agendamento-->
<!-- Modal Agendar Banho --->
<div class="modal fade" id="agendaBanho" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Agendar Banho/Tosa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


        <form id="formagenda" method="post" action="./includes/exec_agendamento.php?acao=cadastrar">
          <div class="container">
            <div class="row">
              <div class="col">
                <h5 id="ag_nome">Nome Animal</h5>
                <div id='ag_valorpacote' name='ag_valorpacote'>Pacote: R$XX,00</div>
                <div id='ag_diabanho' name='ag_diabanho'>Dia do banho: XXXXX-Feira</div>
                <div id='ag_frequencia' name='ag_frequencia'>Frequência: XX/XX dias</div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Observações:</label>
                  <textarea class="form-control" id="ag_obs" name="ag_obs" style="height: 150px" disabled></textarea>
                </div>
              </div>
              <div class="col">
                <div class="mb-1 d-flex justify-content-between" style="width: 308px;">
                  
                  <input type="radio" class="btn-check" name="servico" value="banho" id="success-outlined" autocomplete="off" checked>
                  <label class="btn btn-outline-success" for="success-outlined">Banho</label>
                  
                  <div class="vr ms-3 me-3 d-none"></div>
                  
                  <div class="d-flex justify-content-between align-items-baseline" style="width: 120px;">
                    
                    <input type="radio" class="btn-check" name="servico" value="tosa" id="servico" autocomplete="off">
                    <label class="btn btn-outline-info" for="servico">Tosa</label>
                    
                    <div class="vr ms-3 me-3 d-none"></div>
                    
                    <input class="form-control form-control-sm" type="text" id="valortosa" name="valortosa" style="width: 50px; height:8px" aria-label=".form-control-sm" >
                  </div>

                </div>

                  <div class="d-flex justify-content-between" style="width: 308px;">
                    <div class="fs-6" id="msgquant">0 data(s) selecionadas</div>
                    <div class="vr ms-2 me-2 mb-2"></div>
                    <div class="fs-6" id="msgvalor">Valor: R$0.00</div>
                  </div>

                  <div class="group">
                    <input type="text" id="calendario" name='ag_calendario' class="d-none">
                  </div>

                </div>
              </div>


            </div>
            <input type="hidden" id='ag_idcliente' name="idcliente">
            <input type="hidden" id='ag_idpet' name="idpet">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" value="Agendar" class="btn btn-primary">Agendar</button>
          </div>

        </form>

      </div>

    </div>
  </div>
