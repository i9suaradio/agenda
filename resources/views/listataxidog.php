<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!$_SESSION["admin_id"]) {
    header("Location: index.php");
    exit;
}

include("./includes/meekrodb.2.4.class.php");
include("./includes/funcoes.php");

$data = $_POST['data'] ?? '';

$acao = $_GET['acao'] ?? '';

//Reordenar
if ($acao == 'ordenar') {
    $data = $_POST['data'];
    $novaordem = $_POST['novaordem'];
    $ordematualclientes = $_POST['ordematualclientes'];
    //echo $data . ' - ' . $novaordem . ' - ' . $ordematualclientes;
    //exit;

    $restabTaxidog = DB::query("SELECT agenda.*, clientes.id as idcliente, clientes.nome as nomecliente, clientes.endereco, clientes.telefone, clientes.ordemtaxidog, pets.nome as nomepet, pets.taxidog FROM `agenda`
        inner JOIN clientes on clientes.id = agenda.idcliente
        inner JOIN pets on pets.id = agenda.idpet
        where data = %s and taxidog = 1 and arquivado = 0 and status != 'cancelado'
        group by clientes.id
        order by clientes.ordemtaxidog asc, clientes.nome asc", $data);

    $ar_novasordens = explode(",", $novaordem);
    $ar_ordematualclientes = explode(",", $ordematualclientes);

    $contador = 0;
    foreach ($ar_novasordens as $itemNovaOrdem) {
        updateOrdem($itemNovaOrdem, $contador + 1);

        echo 'item nova ordem:' . $itemNovaOrdem . ' / ' . 'Ordem antiga: ' . $ar_ordematualclientes[$contador] . '<br>';
        echo "<hr>";
        $contador++;
    }

    exit;

    //$contador = 0;
    // for ($i = 1; $i < sizeof($restabTaxidog); $i++) {
    //     echo $restabTaxidog[$i]['idcliente'] . " - >" . $novasordens[$i] . "<br>";

    //     updateOrdem($restabTaxidog[$i]['idcliente'], $novasordens[$i]);
    // }
    // foreach ($restabTaxidog as $tabTaxidog) {
    //     //echo $tabTaxidog['idcliente'] . '<br>';
    //     updateOrdem($tabTaxidog['idcliente'], $novasordens[$contador]);
    //     $contador = $contador + 1;
    //     echo 'id cliente ' . $tabTaxidog['idcliente'] . ' atualizado para ordem ' .  $novasordens[$contador] . '<br>';
    // }

    foreach ($restabTaxidog as $tabTaxidog) {
        //echo $tabTaxidog['idcliente'] . " / " . $tabTaxidog['ordemtaxidog'] . "<br>";
    }

    // echo 'Novas ordens' . '<br>';
    // foreach ($novasordens as $key) {
    //     echo $key . '<br>';
    // }

    // echo '<hr>Registros' . "<br>";
    // foreach ($restabTaxidog as $key) {
    //     echo $key['idcliente'] . '<br>';
    // }

    // echo "<pre>";
    // var_dump($restabTaxidog);
    // echo "</pre>";

    exit;

    //DB::query("Delete from clientes WHERE id=%i", $_GET['id']);
    //header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?mensagem=sucesso');
}

function updateOrdem($idcliente, $ordem)
{
    DB::query("UPDATE clientes SET ordemtaxidog=%i WHERE id=%i", $ordem, $idcliente);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxiDog</title>
</head>
<script src="https://kit.fontawesome.com/a97cf68947.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


<style>
    tr {
        margin: 0px;
        padding: 0px;
    }

    td,
    th {
        margin: 0px !important;
        padding: 0px !important;
    }

    .arrastando {
        background-color: #C3FFB1;
    }
</style>

<body class='pt-3 ps-5 pe-5'>
    <?php
    $restabTaxidog = DB::query("SELECT agenda.*, clientes.id as idcliente, clientes.nome as nomecliente, clientes.endereco, clientes.telefone, pets.nome as nomepet, pets.taxidog FROM `agenda`
  inner JOIN clientes on clientes.id = agenda.idcliente
  inner JOIN pets on pets.id = agenda.idpet
  where data = %s and taxidog = 1 and arquivado = 0 and status != 'cancelado'
  group by clientes.id
  order by clientes.ordemtaxidog asc, clientes.nome asc", $data);

    // echo "<pre>";
    // print_r($restabTaxidog);
    // echo "</pre>";
    // exit;
    ?>
    <div class="w-100 d-flex justify-content-center fs-6 mb-0">
        <?php echo 'Lista Taxi Dog ' . formatadata($data) . ' - ' . diadasemana(date('N', strtotime($data))) ?>
    </div>
    <table class="table table-sm table-striped" style="font-size: 14px; font-weight: 500" id="table-1">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">B</th>
                <th scope="col" class="text-center">E</th>
                <th scope="col"><i class="fa-solid fa-user fa-xs"></i> Nome</th>
                <th scope="col"><i class="fa-solid fa-dog fa-xs"></i> Pet</th>
                <th scope="col"><i class="fa-solid fa-location-dot fa-xs"></i> Endereço</th>
                <th scope="col"><i class="fa-solid fa-phone fa-xs"></i> Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 1;
            $ordemAtualClientes = '';
            foreach ($restabTaxidog as $tabTaxidog) {
                $ordemAtualClientes = $ordemAtualClientes . $tabTaxidog['idcliente'] . ",";
            ?>
                <tr id='<?php echo $tabTaxidog['idcliente']; ?>'>
                    <th class="ps-1 text-center" width='26px'><?php echo $contador; ?></th>
                    <th class="border-start border-end" width='25px'></th>
                    <th class="border-start border-end" width='25px'></th>

                    <td class="ps-1"><?php echo $tabTaxidog['nomecliente']; ?></td>
                    <td style="font-size: 12px; letter-spacing: 0.02em;">
                        <?php
                        $restabPetsTaxidog = DB::query("SELECT agenda.*, pets.nome as nomepet, pets.taxidog FROM `agenda`
        inner JOIN pets on pets.id = agenda.idpet
        where data = %s and agenda.idcliente = %i and taxidog = 1 and arquivado = 0
        order by pets.idcliente, pets.nome asc;", $data, $tabTaxidog['idcliente']);
                        foreach ($restabPetsTaxidog as $tabPetsTaxidog) {
                            echo '*' . $tabPetsTaxidog['nomepet'] . '   ';
                        }
                        ?>
                    </td>
                    <?php
                    $procurarPor = array("Rua", "Avenida", "Maria", "Bairro", "Condominio", "Nossa Senhora", "Condomínio", "Antonio");
                    $trocarPor = array("R.", "Av.", "M.ª ", "B.", "Cond.", "Nsa. Sra.", "Cond.", "Ant.");
                    $endereco = str_ireplace($procurarPor, $trocarPor, $tabTaxidog['endereco']);
                    ?>
                    <td style="font-size: 12px; letter-spacing: 0.02em;"><?php echo $endereco; ?></td>
                    <td><?php echo $tabTaxidog['telefone']; ?></td>
                </tr>
            <?php
                $contador++;
            } ?>

        </tbody>
    </table>
</body>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js" integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#table-1").tableDnD({
            onDragClass: "arrastando",
            onDragStart: function(table, row) {},
            onDrop: function(table, row) {

                var rows = table.tBodies[0].rows;
                var debugStr = "";

                for (var i = 0; i < rows.length; i++) {
                    debugStr += rows[i].id + ",";
                }

                $('#debugArea').html(debugStr);

                $.post("./listataxidog.php?acao=ordenar", {
                    data: "<?php echo $data; ?>",
                    ordematualclientes: "<?php echo rtrim($ordemAtualClientes, ','); ?>",
                    novaordem: debugStr.substring(0, debugStr.length - 1)
                }).done(function() {
                    location.reload()
                });

            }
        });
    });
</script>

</html>