<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!$_SESSION["admin_id"]) {
  exit;
}

include("meekrodb.2.4.class.php");
include("funcoes.php");

$restabAgenda = DB::query("SELECT agenda.*, clientes.id as idcliente, clientes.nome as nomecliente, pets.nome as nomepet FROM agenda
inner join clientes on clientes.id = agenda.idcliente
inner join pets on pets.id = agenda.idpet
where status = 'agendado' and arquivado = 0 and data BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) and DATE_ADD(NOW(), INTERVAL 2 MONTH) order by data asc");
//$tabPets = DB::query("SELECT * FROM pets where idcliente = %i" , $id);

// echo "<pre>";
// print_r($tabPets);
// echo "</pre>";
// exit;

$temparray=array();
$array_final=array();
$array_saida=array();

foreach ($restabAgenda as $tabAgenda) {
  $temparray['id']=intval($tabAgenda['idcliente']);
  $temparray['title']=$tabAgenda['nomecliente'] . '-' . $tabAgenda['nomepet'];

  $temparray['color']=$tabAgenda['servico']=='banho' ? '#10B980' : '#2361ce'; 

  $temparray['start']=$tabAgenda['data'];
  $temparray['end']=$tabAgenda['data'];
  $temparray['url']='/cliente.php?id=' . $tabAgenda['idcliente'];
  
  array_push($array_final,$temparray);
  array_push($array_saida, $array_final[0]);
  $array_final = array();
}

//echo json_encode([$temparray],JSON_UNESCAPED_UNICODE);
echo json_encode($array_saida,JSON_UNESCAPED_UNICODE);