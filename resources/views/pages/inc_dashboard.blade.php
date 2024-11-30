<?php
$tabClientes = DB::query("SELECT count(*) as total FROM `clientes`")[0];
$tabPets = DB::query("SELECT count(*) as total FROM `pets`")[0];
$tabBanhos = DB::query("SELECT count(*) as total FROM `agenda` where servico = 'banho' and status = 'agendado'")[0];
$tabTosas = DB::query("SELECT count(*) as total FROM `agenda` where servico = 'tosa' and status = 'agendado'")[0];

$tabSomaBanhosAg = DB::query("SELECT SUM(valor) as total FROM `agenda` where servico = 'banho' and status = 'agendado'")[0];
$tabSomaBanhosEx = DB::query("SELECT SUM(valor) as total FROM `agenda` where servico = 'banho' and status = 'executado'")[0];

$tabSomaTosasAg = DB::query("SELECT SUM(valor) as total FROM `agenda` where servico = 'tosa' and status = 'agendado'")[0];
$tabSomaTosasEx = DB::query("SELECT SUM(valor) as total FROM `agenda` where servico = 'tosa' and status = 'executado'")[0];

for ($i = 0; $i < 6; $i++) {
  ${'mes' . $i} = date('Y-m-d', strtotime("-$i month 2 days"));
  //echo date('Y-m-d', strtotime("-$i month 2 days")) . '<br>';
}

//Banhos
//Banhos
//Banhos
//Banhos
//select * from `agenda` where month(data) = 5 and year(data) = year(NOW()) ORDER by data asc limit 10000;
$tabQuantBanho0 = DB::query("SELECT count(*) as total, month('$mes0') as mes from `agenda` where servico = 'banho' and (status = 'pago' or status = 'executado') and month(data) = month('$mes0') and year(data) = year('$mes0');")[0];
$tabQuantBanho1 = DB::query("SELECT count(*) as total, month('$mes1') as mes from `agenda` where servico = 'banho' and (status = 'pago' or status = 'executado') and month(data) = month('$mes1') and year(data) = year('$mes1');")[0];
$tabQuantBanho2 = DB::query("SELECT count(*) as total, month('$mes2') as mes from `agenda` where servico = 'banho' and (status = 'pago' or status = 'executado') and month(data) = month('$mes2') and year(data) = year('$mes2');")[0];
$tabQuantBanho3 = DB::query("SELECT count(*) as total, month('$mes3') as mes from `agenda` where servico = 'banho' and (status = 'pago' or status = 'executado') and month(data) = month('$mes3') and year(data) = year('$mes3');")[0];
$tabQuantBanho4 = DB::query("SELECT count(*) as total, month('$mes4') as mes from `agenda` where servico = 'banho' and (status = 'pago' or status = 'executado') and month(data) = month('$mes4') and year(data) = year('$mes4');")[0];
$tabQuantBanho5 = DB::query("SELECT count(*) as total, month('$mes5') as mes from `agenda` where servico = 'banho' and (status = 'pago' or status = 'executado') and month(data) = month('$mes5') and year(data) = year('$mes5');")[0];
$quantBanho = array();
$temparraybanho = array();
$temparraybanho['0']=[intval($tabQuantBanho0['total']), nomedomes($tabQuantBanho0['mes'])];
$temparraybanho['1']=[intval($tabQuantBanho1['total']), nomedomes($tabQuantBanho1['mes'])];
$temparraybanho['2']=[intval($tabQuantBanho2['total']), nomedomes($tabQuantBanho2['mes'])];
$temparraybanho['3']=[intval($tabQuantBanho3['total']), nomedomes($tabQuantBanho3['mes'])];
$temparraybanho['4']=[intval($tabQuantBanho4['total']), nomedomes($tabQuantBanho4['mes'])];
$temparraybanho['5']=[intval($tabQuantBanho5['total']), nomedomes($tabQuantBanho5['mes'])];
array_push($quantBanho,$temparraybanho);
$array_final_banho = array_reverse($quantBanho[0]);


//Tosas
//Tosas
//Tosas
//Tosas
//Tosas
//select * from `agenda` where month(data) = 5 and year(data) = year(NOW()) ORDER by data asc limit 10000;
$tabQuantTosa0 = DB::query("SELECT count(*) as total, month('$mes0') as mes from `agenda` where servico = 'tosa' and (status = 'pago' or status = 'executado') and month(data) = month('$mes0') and year(data) = year('$mes0');")[0];
$tabQuantTosa1 = DB::query("SELECT count(*) as total, month('$mes1') as mes from `agenda` where servico = 'tosa' and (status = 'pago' or status = 'executado') and month(data) = month('$mes1') and year(data) = year('$mes1');")[0];
$tabQuantTosa2 = DB::query("SELECT count(*) as total, month('$mes2') as mes from `agenda` where servico = 'tosa' and (status = 'pago' or status = 'executado') and month(data) = month('$mes2') and year(data) = year('$mes2');")[0];
$tabQuantTosa3 = DB::query("SELECT count(*) as total, month('$mes3') as mes from `agenda` where servico = 'tosa' and (status = 'pago' or status = 'executado') and month(data) = month('$mes3') and year(data) = year('$mes3');")[0];
$tabQuantTosa4 = DB::query("SELECT count(*) as total, month('$mes4') as mes from `agenda` where servico = 'tosa' and (status = 'pago' or status = 'executado') and month(data) = month('$mes4') and year(data) = year('$mes4');")[0];
$tabQuantTosa5 = DB::query("SELECT count(*) as total, month('$mes5') as mes from `agenda` where servico = 'tosa' and (status = 'pago' or status = 'executado') and month(data) = month('$mes5') and year(data) = year('$mes5');")[0];

$quantTosa = array();
$tempoarraytosa = array();
$tempoarraytosa['0']=[intval($tabQuantTosa0['total']), nomedomes($tabQuantTosa0['mes'])];
$tempoarraytosa['1']=[intval($tabQuantTosa1['total']), nomedomes($tabQuantTosa1['mes'])];
$tempoarraytosa['2']=[intval($tabQuantTosa2['total']), nomedomes($tabQuantTosa2['mes'])];
$tempoarraytosa['3']=[intval($tabQuantTosa3['total']), nomedomes($tabQuantTosa3['mes'])];
$tempoarraytosa['4']=[intval($tabQuantTosa4['total']), nomedomes($tabQuantTosa4['mes'])];
$tempoarraytosa['5']=[intval($tabQuantTosa5['total']), nomedomes($tabQuantTosa5['mes'])];
array_push($quantTosa,$tempoarraytosa);
$array_final_tosa = array_reverse($quantTosa[0]);

//echo json_encode($array_final);

// echo "<pre>";
// print_r($array_final);
// echo "</pre>";
// exit;

/*
SELECT clientes.nome, agenda.idcliente, agenda.data, agenda.status FROM `agenda`
cross join clientes on clientes.id = agenda.idcliente
where data < DATE_SUB(NOW(), INTERVAL 1 month) and status = 'executado' and arquivado = 0
group by agenda.idcliente
order by agenda.data asc;
*/

$restabDevedores = DB::query("SELECT clientes.nome, agenda.idcliente, agenda.data, agenda.status,
(SELECT sum(agenda.valor) from agenda where agenda.idcliente = clientes.id and agenda.status = 'executado') as somabanhos,
(SELECT sum(itens.valor) from itens where itens.idcliente = agenda.idcliente and itens.pago = 0 and itens.arquivado = 0) as somaitens,
(SELECT count(*) from agenda where agenda.idcliente = clientes.id and agenda.status = 'executado') as quantbanhostosas
FROM `agenda`
cross join clientes on clientes.id = agenda.idcliente
where data < DATE_SUB(NOW(), INTERVAL 1 month) and status = 'executado' and arquivado = 0
GROUP BY clientes.id
order by somabanhos desc");


/*
SELECT clientes.nome, agenda.idcliente, agenda.data, agenda.status,
(SELECT sum(agenda.valor) from agenda where agenda.idcliente = clientes.id and  agenda.status = 'executado' and agenda.arquivado = 0 ) as somabanhos,
(SELECT sum(itens.valor) from itens where itens.id = agenda.idcliente and itens.pago = 0 and itens.arquivado = 0 ) as somaitens
FROM `agenda`
cross join clientes on clientes.id = agenda.idcliente
where data < DATE_SUB(NOW(), INTERVAL 1 month) and status = 'executado' and arquivado = 0
order by somabanhos desc
limit 1000;
*/

?>
<style type="text/css">
    .hiddenRow {
    padding: 0 !important;
}
</style>
<main class="col ms-sm-auto overflow-visible">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0 d-none">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      <?php if($_SESSION["admin_tipo"]=='usuario' or $_SESSION["admin_tipo"]=='admin'){?>
        <div class="row mb-4">
          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-4">
                            <div class="avatar">
                                <div class="">
                                <i class="fa-solid fa-users fa-2xl" style="color:limegreen"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Clientes</p>
                            <h4 class="mb-0"><?echo $tabClientes['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-4">
                            <div class="avatar">
                                <div class="">
                                <i class="fa-solid fa-dog fa-2xl" style="color:sienna"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Pets</p>
                            <h4 class="mb-0"><?echo $tabPets['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                                <div class="">
                                  <i class="fa-solid fa-shower fa-2xl" style="color:skyblue"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Banhos Agendados</p>
                            <h4 class="mb-0"><?echo $tabBanhos['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                                <div class="">
                                <i class="fa-solid fa-scissors fa-2xl" style="color:lightgray"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Tosas Agendadas</p>
                            <h4 class="mb-0"><?echo $tabTosas['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
        
      </div>
      <?php }?>

      <?php if($_SESSION["admin_tipo"]=='admin'){?>
      <div class="row">
          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-4">
                            <div class="avatar">
                                <div class="">
                                  <span class="fa-stack">
                                    <i class="fa-regular fa-calendar fa-2xl fa-stack-1x"></i>
                                    <i class="fa-solid fa-shower fa-sm fa-stack-1x pt-1" style="color:skyblue"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Banhos Agendados</p>
                            <h4 class="mb-0">R$ <?echo $tabSomaBanhosAg['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-4">
                            <div class="avatar">
                                <div class="">
                                  <span class="fa-stack">
                                      <i class="fa-solid fa-shower fa-2xl fa-stack-1x" style="color:skyblue"></i>
                                      <i class="fa-solid fa-check fa-stack-2x pb-1" style="color:Green"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Banhos Executados</p>
                            <h4 class="mb-0">R$ <?echo $tabSomaBanhosEx['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                                <div class="">
                                <span class="fa-stack">
                                    <i class="fa-regular fa-calendar fa-2xl fa-stack-1x"></i>
                                    <i class="fa-solid fa-scissors fa-sm fa-stack-1x pt-1" style="color:lightgray"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Tosas Agendados</p>
                            <h4 class="mb-0">R$ <?echo $tabSomaTosasAg['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                                <div class="">
                                <span class="fa-stack">
                                      <i class="fa-solid fa-scissors fa-2xl fa-stack-1x" style="color:lightgray"></i>
                                      <i class="fa-solid fa-check fa-stack-2x pb-1" style="color:Green"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Tosas Executadas</p>
                            <h4 class="mb-0">R$ <?echo $tabSomaTosasEx['total']?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                            <div class="badge rounded-pill font-size-13 badge-soft-success">+ 2.65%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
      </div>
      <?php }?>
      
    <?php if($_SESSION["admin_tipo"]=='admin'){?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="row mt-4">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="graficoBanhos"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="graficoTosas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12">
            <div class="table-responsive">
            
            <!---->
            <h6>Débitos a mais de 30 dias</h6>
            <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Quant. Banhos e/ou Tosas Executados</th>
                            <th>Valor Total Banhos</th>
                            <th>Valor Total Itens</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($restabDevedores as $tabDevedores) {

                            // $resTabAgenda = DB::query("SELECT clientes.nome, agenda.idcliente, agenda.data, sum(agenda.valor) as valortotal, COUNT(*) as totalagenda, agenda.status FROM `agenda`
                            // cross join clientes on clientes.id = agenda.idcliente
                            // where data < DATE_SUB(NOW(), INTERVAL 1 month) and status = 'executado' and arquivado = 0 and agenda.idcliente = %i
                            // order by agenda.data asc", $tabDevedores['idcliente'])[0];
                        ?>
                        <tr>
                            <td><a href="./cliente.php?id=<?php echo $tabDevedores['idcliente']?>"><?php echo $tabDevedores['nome']?></a></td>
                            <td><?php echo $tabDevedores['quantbanhostosas']?></td>
                            <td><?php echo $tabDevedores['somabanhos']?></td>
                            <td><?php echo $tabDevedores['somaitens'] ? $tabDevedores['somaitens'] : '0,00'; ?></td>
                            <td><a class='btn btn-sm btn-primary' data-bs-toggle="collapse" href="#collapse<?php echo $tabDevedores['idcliente']?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $tabDevedores['idcliente']?>"> + </a></td>
                        </tr>

                        <tr>
                            <td colspan="7" class="hiddenRow">
                                <div class="collapse" id="collapse<?php echo $tabDevedores['idcliente']?>">Listagem dos Débitos</div>
                            </td>
                        </tr>
                       <?php
                        $total += $tabDevedores['somabanhos'] + $tabDevedores['somaitens'];
                        }
                        ?>
                    </tbody>
                    
                    <?php if($_SESSION["admin_tipo"]=='admin'){?>
                    <tfoot>
                    <tr>
                            <th colspan="5" style="text-align: right">Total Geral: <?php echo formatamoeda($total); ?></th>
                        </tr>
                    </tfoot>
                    <?php }?>

                </table>
            <!---->


            </div>
        </div>
    </div>

        <script>
        const ctxbanhos = document.getElementById('graficoBanhos');
        const ctxtosas = document.getElementById('graficoTosas');

        new Chart(ctxbanhos, {
            type: 'line',
            data: {
            //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            labels: [<?php
                foreach ($array_final_banho as $elemento){
                    echo '\'' . $elemento[1] . '\',' ;
                }
            ?>],
            datasets: [{
                label: 'Banhos (Pagos OU Executados)',
                data: [<?php
                foreach ($array_final_banho as $elemento){
                    echo '\'' . $elemento[0] . '\',' ;
                }
            ?>],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

        new Chart(ctxtosas, {
            type: 'line',
            data: {
            //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            labels: [<?php
                foreach ($array_final_tosa as $elemento){
                    echo '\'' . $elemento[1] . '\',' ;
                }
            ?>],
            datasets: [{
                label: 'Tosas (Pagas OU Executadas)',
                data: [<?php
                foreach ($array_final_tosa as $elemento){
                    echo '\'' . $elemento[0] . '\',' ;
                }
            ?>],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        </script>

  
    </main>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>