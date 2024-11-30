<?php
if(isset($_GET['data'])){
  $data = formatadatamysql2($_GET['data']);
}else{
  $data = date("Y-m-d");
};

$serv = $_GET["servico"] ?? '';
$status = $_GET["status"] ?? '';
$and = '';

if($status=='executado'){ $and = "and status = 'executado' ";}
if($status=='pago'){ $and = $and . "and status = 'pago' ";}
if($status=='agendado'){ $and = $and . "and status = 'agendado' ";}
if($status=='cancelado'){ $and = $and . "and status = 'cancelado' ";}

if($serv=='' || $_GET["servico"]=='todos'){
  $restabAgenda = DB::query("SELECT agenda.*, clientes.nome FROM `agenda`
  inner JOIN clientes on clientes.id = agenda.idcliente
  where data = %s and arquivado = 0 $and
  group by clientes.id
  order by clientes.nome asc;", $data);
}else{
  $restabAgenda = DB::query("SELECT agenda.*, clientes.nome FROM `agenda`
  inner JOIN clientes on clientes.id = agenda.idcliente
  where data = %s  and arquivado = 0 and servico = %s $and
  group by clientes.id
  order by clientes.nome asc;", $data,$serv);
}

/* pega tudo
SELECT agenda.*, clientes.nome, clientes.endereco, pets.nome, pets.taxidog FROM `agenda`
inner JOIN clientes on clientes.id = agenda.idcliente
inner JOIN pets on pets.id = agenda.idpet
where data = '2023-05-12'
group by clientes.id
order by clientes.nome asc;
*/

// echo '<pre>';
// print_r($restabAgenda);
// echo '</pre>';
?>
<main class="col ms-sm-auto overflow-visible">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Agenda do Dia - <?php echo formatadata($data) . " " . diadasemana(date('w',strtotime($data)));?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cadastraCliente">
          <i class="fa-solid fa-plus me-2"></i>
             Cadastrar
          </button>
        </div>
      </div>
      
      <span>Selecione a data para exibir a Agenda diária</span>

      <div class="p-1">

        <form method="get" action="./agendadodia.php">
                
        
        <div class="hstack gap-3 d-flex align-items-center">

          <input type="text" id="calagendadodia" name='data' class="form-control" style="width: 120px;">
          
          <div class="vr"></div>

          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="servico" id="inlineRadio1" value="todos" <?php echo (isset($_GET["servico"]) && $_GET["servico"]=='todos') ? 'checked' : null ?><?php echo !isset($_GET["servico"]) ? 'checked' : null;?>>
            <label class="form-check-label" for="inlineRadio1">Todos</label>
          </div>
          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="servico" id="inlineRadio2" value="banho" <?php echo (isset($_GET["servico"]) && $_GET["servico"]=='banho') ? 'checked' : null ?>>
            <label class="form-check-label" for="inlineRadio2"><i class="btn btn-sm btn-success rounded-pill" style="width: 1rem; height:1rem;"></i> Banho</label>
          </div>
          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="servico" id="inlineRadio3" value="tosa" <?php echo (isset($_GET["servico"]) && $_GET["servico"]=='tosa') ? 'checked' : null ?>>
            <label class="form-check-label" for="inlineRadio3"><i class="btn btn-sm btn-info rounded-pill" style="width: 1rem; height:1rem;"></i> Tosa</label>
          </div>
          <div class="vr"></div>

          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="status" id="inlineCheckbox0" value="" <?php echo $status=='' ? 'checked' : null;?>>
            <label class="form-check-label" for="inlineCheckbox0"><div class="badge bg-dark" style="width: 75px;">Todos</div></label>
          </div>

          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="status" id="inlineCheckbox1" value="executado" <?php echo $status=='executado' ? 'checked' : null;?>>
            <label class="form-check-label" for="inlineCheckbox1"><div class="badge bg-info" style="width: 75px;">Executado</div></label>
          </div>
          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="status" id="inlineCheckbox2" value="pago" <?php echo $status=='pago' ? 'checked' : null;?>>
            <label class="form-check-label" for="inlineCheckbox2"><span class="badge rounded-pill text-bg-success">Pago</span></label>
          </div>
          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="status" id="inlineCheckbox3" value="agendado" <?php echo $status=='agendado' ? 'checked' : null;?>>
            <label class="form-check-label" for="inlineCheckbox3"><span class="badge rounded-pill text-bg-warning">Agendado</span></label>
          </div>
          <div class="form-check form-check-inline mt-2">
            <input class="form-check-input" type="radio" name="status" id="inlineCheckbox4" value="cancelado" <?php echo $status=='cancelado' ? 'checked' : null;?>>
            <label class="form-check-label" for="inlineCheckbox4"><span class="badge rounded-pill text-bg-danger">Cancelado</span></label>
          </div>

          <div class="vr"></div>

          <button type="submit" value="enviar" class="btn btn-primary">Mostrar Agenda</button>

        </div>
        </form>
      </div>
      <hr>
      <div class="mb-3 ms-1">
        <input type="email" class="form-control d-none" id="myInput" placeholder="Buscar cliente ou pet" onkeyup="myFunction()">
      </div>
      
      <div class="">
        <table class="table table-sm" id="myTable">
          <thead>
            <tr>
              <th scope="col" style="width: 25px;">#</th>
              <th scope="col" class='' style="width: 50px;">Nome</th>
              <th scope="col">Valor Serviço</th>
              <th scope="col">Data Pago</th>
              <th scope="col" style="width: 150px;">Status</th>
              <th scope="col" style="width: 20px;">Ações</th>
            </tr>
          </thead>
          
          <tbody>
          <?php
          $contador = 1;
          foreach ($restabAgenda as $tabAgenda) {
            $restabAgCliente = DB::query("select agenda.*, pets.nome from agenda
            inner join pets on pets.id = agenda.idpet
            where agenda.idcliente = %i and data = %s and arquivado = 0
            order by pets.nome asc", $tabAgenda['idcliente'], $data);
            
            // echo "<pre>";
            // print_r($restabAgCliente);
            // echo "</pre>";
            // exit;
          ?>
            <tr>
              <!-- <td scope="col"><?php echo $contador;?></td> -->
              <td colspan='6' scope="col" class="clearfix">
                <h6 class='mt-2'>
                  <a href="./cliente.php?id=<?php echo $tabAgenda['idcliente'];?>" target="_blank">
                  <?php echo $tabAgenda['nome'];?>
                  </a>
                </h6>
              </td><!--Nome do Cliente-->
            </tr>
            
            <!--Loop pets-->
            <?php
                foreach ($restabAgCliente as $tabAgendaCliente) {
                
                  $servico =  $tabAgendaCliente['servico']=='banho' ? 'success' : "info";
          
                  switch ($tabAgendaCliente['status']) {
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
            <tr id='linhaagenda<?php echo $tabAgendaCliente['id'];?>'>
              <td>
                <i class="btn btn-sm btn-<?php echo $servico;?> rounded-pill" style="width: 1rem; height:1rem;"> </i>
              <?php echo $tabAgendaCliente['nome'];?></td>
              <td></td>
              <td><?php echo $tabAgendaCliente['valor'];?></td>
            <td><div id="datapago<?php echo $tabAgendaCliente['id'];?>"><?php echo formatadata($tabAgendaCliente['datapago']);?></td>
            <td><div id="agenda<?php echo $tabAgendaCliente['id'];?>" class="badge <?php echo $status;?>" style="width: 75px;"><?php echo $tabAgendaCliente['status'];?></div></td>
            <td>
            <div class="dropdown">
                <button class="btn btn-info btn-sm me-1 dropdown-toggle me-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
                <ul class="dropdown-menu">
                  <!---
                  <li><a href="./agendadodia.php?acao=editaagenda&status=executado&idagenda=<?php echo $tabAgendaCliente['id'];?>&id=<?php echo $tabAgenda['id'];?>&data=<?php echo formatadata($data);?>&servico=<?php echo $serv;?>" class="dropdown-item" type="button"><i class="fa-regular fa-calendar-check me-1"></i> Executado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./agendadodia.php?acao=editaagenda&status=pago&idagenda=<?php echo $tabAgendaCliente['id'];?>&id=<?php echo $tabAgenda['id'];?>&data=<?php echo formatadata($data);?>&servico=<?php echo $serv;?>" class="dropdown-item" type="button"><i class="fa-solid fa-check me-1"></i> Pago</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./agendadodia.php?acao=editaagenda&status=agendado&idagenda=<?php echo $tabAgendaCliente['id'];?>&id=<?php echo $tabAgenda['id'];?>&data=<?php echo formatadata($data);?>&servico=<?php echo $serv;?>" class="dropdown-item" type="button"><i class="fa-regular fa-calendar me-1"></i> Agendado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./agendadodia.php?acao=editaagenda&status=cancelado&idagenda=<?php echo $tabAgendaCliente['id'];?>&id=<?php echo $tabAgenda['id'];?>&data=<?php echo formatadata($data);?>&servico=<?php echo $serv;?>" class="dropdown-item" type="button"><i class="fa-regular fa-calendar-xmark me-1"></i> Cancelado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="./agendadodia.php?acao=editaagenda&status=arquivado&idagenda=<?php echo $tabAgendaCliente['id'];?>&id=<?php echo $tabAgenda['id'];?>&data=<?php echo formatadata($data);?>&servico=<?php echo $serv;?>" class="dropdown-item" type="button"><i class="fa-solid fa-book-skull me-1"></i> Arquivado</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <hr>
                  --->
                  <li>
                    <a id='status<?php echo $tabAgendaCliente['id'];?>' 
                    class="dropdown-item"
                    data-idagenda="<?php echo $tabAgendaCliente['id'];?>"
                    data-status="executado"
                    data-paginaorigem="agendadodia"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Executado</a></li>
                    <hr>
                  <li>
                    <a id='pagostatus<?php echo $tabAgendaCliente['id'];?>' 
                    class="dropdown-item"
                    data-idagenda="<?php echo $tabAgendaCliente['id'];?>"
                    data-status="pago"
                    data-paginaorigem="agendadodia"
                    data-bs-toggle="modal"
                    data-bs-target="#modalPago"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Pago</a></li>
                    <hr>
                  <li>
                    <a id='status<?php echo $tabAgendaCliente['id'];?>' 
                    class="dropdown-item"
                    data-idagenda="<?php echo $tabAgendaCliente['id'];?>"
                    data-status="agendado"
                    data-paginaorigem="agendadodia"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Agendado</a></li>
                    <hr>
                  <li>
                    <a id='status<?php echo $tabAgendaCliente['id'];?>' 
                    class="dropdown-item"
                    data-idagenda="<?php echo $tabAgendaCliente['id'];?>"
                    data-status="cancelado"
                    data-paginaorigem="agendadodia"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Cancelado</a></li>
                    <hr>
                  <li>
                    <a id='status<?php echo $tabAgendaCliente['id'];?>' 
                    class="dropdown-item"
                    data-idagenda="<?php echo $tabAgendaCliente['id'];?>"
                    data-status="arquivado"
                    data-paginaorigem="agendadodia"
                    type="button"><i class="fa-regular fa-calendar-check me-1"></i> Arquivado</a></li>
                    <hr>
                    <li><a class="dropdown-item text-danger" type="button" id="deletaragenda" name="<?php echo $tabAgendaCliente['id']?>" data-idagenda="<?php echo $tabAgendaCliente['id']?>" data-idcliente="<?php echo $tabAgendaCliente['idcliente']?>" data-callback="nocallback"><i class="fa-solid fa-trash me-1"></i> Apagar</a></li>
                </ul>
              </div>
            </td>
            </tr>
            <?php }?></th>
            <!--Loop pets-->
            
            <tr>
              <th colspan="6" class="table-dark" style="height: 2px; padding: 0px;"></th>
            </tr>
            <?php
            $contador += 1;
            } ?>
            

          </tbody>

          </table>
        </div>

    </main>
    
<script>
  function rmydays(date) {
      return (date.getDay() === 0);
  }
  var cal = $("#calagendadodia").flatpickr({
    locale: 'pt',
    defaultDate: "<?php echo formatadata($data); ?>",
    mode: "single",
    dateFormat: "d/m/Y",
    //inline: 'true',
    disable: [rmydays ],
    theme: 'material_green',
    onChange: function(selectedDates, dateStr, instance) {
      
    },
  });
</script>

 <script>
  const d = document;
  d.addEventListener("DOMContentLoaded", function(event) {
  // Datepicker
  var datepickers = [].slice.call(d.querySelectorAll('[data-datepicker]'))
      var datepickersList = datepickers.map(function (el) {
          return new Datepicker(el, {
              autohide: true,
              language: 'pt-br',
              format: 'dd/mm/yyyy',
              buttonClass: 'btn'
            });
      })
  });

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  console.log(input);
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>