<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!$_SESSION["admin_id"]) {
  header("Location: index.php");
  exit;
}

include("meekrodb.2.4.class.php");

$acao = $_GET['acao'] ?? '';
$idcliente = $_POST['idcliente'] ?? '';
$idpet = $_POST['idpet'] ?? '';

//C - Cadastrar um cliente
if($acao=='cadastrar'){

//Selects
$tabCliente = DB::query("SELECT * FROM clientes where id = %i", $idcliente)[0];
$tabPet = DB::query("SELECT * FROM pets where id = %i and idcliente = %i", $idpet,$idcliente)[0];

// echo "<pre>";
// print_r($tabCliente);
// print_r($tabPet);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$datas[] = explode(", ", $_POST['ag_calendario']);


// echo "<pre>";
// print_r($datas);
// echo "</pre>";


$divisor = 0;
switch ($tabPet['frequencia']) {
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

$valor = $_POST['servico'] == 'banho' ? $tabPet['valorpacote']/$divisor : $_POST['valortosa'];

foreach ($datas[0] as $data) {
  DB::insert('agenda', [
    'idcliente' => $tabCliente['id'],
    'idpet' => $tabPet['id'],
    'servico' => $_POST['servico'],
    'data' => $data,
    'obs' => $tabPet['observacao'],
    'valor' => $valor,
    'status' => 'agendado'
    ]);  
  }

  header('Location: /cliente.php?id=' . $tabCliente['id'] . '&acao=sucesso');
}

echo "<pre>";
print_r($_POST);
echo "</pre>";
?>