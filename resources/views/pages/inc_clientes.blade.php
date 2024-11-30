<?php
$restabClientes = DB::query("SELECT * FROM clientes order by diabanho asc, clientes.nome asc");
?>
<main class="col ms-sm-auto">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cadastraCliente">
          <i class="fa-solid fa-plus me-2"></i>
             Cadastrar
          </button>
        </div>
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <div class="mb-3">
        <input type="email" class="form-control" id="myInput" placeholder="Buscar cliente ou pet" onkeyup="myFunction()">
      </div>

      <!-- <h2>Section title</h2> -->
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="myTable">
          <thead>
            <tr>
              <th scope="col" class=''>Nome</th>
              <th scope="col" class='w-10'>
                <div class="d-flex justify-content-around" style="width: 300px;">
                  <spam>Banho</spam>
                  <spam>Tosa</spam>
                  <spam>Ítens</spam>
                  <spam>Total</spam>
                </div>
              </th>
              <!-- <th scope="col" style="width: 100px;">Endereço / Telefone</th> -->
              <th scope="col" class="text-truncate w-50">Obs.</th>
              <th scope="col" class="text-align-center">Ações</th>
            </tr>
          </thead>
          <tbody class="align-middle">
          <?php foreach ($restabClientes as $tabClientes) {
            $restabPets = DB::query("SELECT * FROM pets where idcliente =  %i order by pets.nome asc", $tabClientes['id']);
            ?>
            <tr >
              <td><?php echo $tabClientes['nome']?> 
              <?php foreach ($restabPets as $tabPet) {
                
              
              ?>
              <a class='badge rounded-pill text-bg-success ms-1'
                id="editarpet"
                name="<?php echo $tabPet['id']?>"
                data-idcliente="<?php echo $tabClientes['id']?>"
                data-idpet="<?php echo $tabPet['id']?>"
                data-nome="<?php echo $tabPet['nome']?>"
                data-valorpacote="<?php echo $tabPet['valorpacote']?>"
                data-obs="<?php echo $tabPet['observacao']?>"
                data-diabanho="<?php echo $tabClientes['diabanho']?>"
                data-frequencia="<?php echo $tabPet['frequencia']?>"
                data-bs-toggle="modal"
                data-bs-target="#editarPet"
              ><?php echo $tabPet['taxidog'] ? '*' : ''; ?><?php echo $tabPet['nome']?></span>
              <?php }?>
              <span class='visually-hidden'><?php echo diadasemana($tabClientes['diabanho']);?></span></td>
              <?php
              $somabanho = DB::query("SELECT SUM(valor) as valor FROM agenda where idcliente =  %i and servico = 'banho' and status = 'executado' and arquivado = 0", $tabClientes['id']);
              $somatosa = DB::query("SELECT SUM(valor) as valor FROM agenda where idcliente =  %i and servico = 'tosa' and status = 'executado'", $tabClientes['id']);
              $somaitens = DB::query("SELECT SUM(valor) - SUM(pagamentoparcial) as valor FROM itens where idcliente = %i and pago = 0 and arquivado = 0;", $tabClientes['id']);
              
              $totalgeral =  ($somabanho[0]['valor'] ? $somabanho[0]['valor'] : 0) + ($somatosa[0]['valor'] ? $somatosa[0]['valor'] : 0) + ($somaitens[0]['valor'] ? $somaitens[0]['valor'] : 0);
              ?>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                  <?php !$somabanho[0]['valor'] ? $corbanho = 'dark' : $corbanho = 'danger'; ?>
                  <button type="button" style="width: 75px"  class="btn btn-outline-<?echo $corbanho?> disabled"><?php echo ($somabanho[0]['valor'] ? $somabanho[0]['valor'] : '0');?></button>

                  <?php !$somatosa[0]['valor'] ? $cortosa = 'dark' : $cortosa = 'danger'; ?>
                  <button type="button" style="width: 75px"  class="btn btn-outline-<?echo $cortosa?> disabled"><?php echo ($somatosa[0]['valor'] ? $somatosa[0]['valor'] : '0');?></button>

                  <?php !$somaitens[0]['valor'] ? $coritem = 'dark' : $coritem = 'danger'; ?>
                  <button type="button" style="width: 75px"  class="btn btn-outline-<?echo $coritem?> disabled"><?php echo ($somaitens[0]['valor'] ? $somaitens[0]['valor'] : '0');?></button>

                  <?php !$totalgeral>= "0.00" ? $corgeral = 'dark' : $corgeral = 'danger'; ?>
                  <button type="button" style="width: 75px"  class="btn btn-outline-<?php echo $corgeral;?> disabled"><?php echo number_format((float)$totalgeral, 2, '.', '');?></button>
                </div>
              </td>
              <!-- <td><small><?php //echo $tabClientes['endereco'] . ' / ' . $tabClientes['telefone']?></small></td> -->
              <td><small><?php echo $tabClientes['obs']?></small></td>
              <td>
                <a class="btn btn-primary btn-sm" id="editarcliente" name="<?php echo $tabClientes['id']?>" data-idcliente="<?php echo $tabClientes['id']?>"  data-bs-toggle="modal" data-bs-target="#editaCliente"><i class="fa-solid fa-eye"></i></a>
                <a href='./cliente.php?id=<?php echo $tabClientes['id']?>' class="btn btn-primary btn-sm" name="<?php echo $tabClientes['id']?>" data-idcliente="<?php echo $tabClientes['id']?>"><i class="fa-solid fa-arrow-right"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
    