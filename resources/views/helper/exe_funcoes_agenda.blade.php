<?php

// //C - Cadastrar um cliente
// if($acao=='cadastrar'){

//   DB::insert('clientes', [
//     'nome' => $_POST['nome'],
//     'endereco' => $_POST['endereco'],
//     'telefone' => $_POST['telefone'],
//     'obs' => $_POST['obs'],
//     'ativo' => 1
//   ]);
//   $idusuario = DB::insertId();
//   if(!$_POST['nomepet'][0]==''){
//     $i=0;
//     foreach ($_POST['nomepet'] as $valor) {
//       DB::insert('pets', [
//         'idcliente' => $idusuario,
//         'nome' => $_POST['nomepet'][$i],
//         'raca' => $_POST['raca'][$i]
//       ]);
//       $i++;
//     }
//   }
//   header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?acao=sucesso');
// }

//R - Informações de uma programacao
if($acao=='info'){
  $id = $_GET['id'];
  $tabAgenda = DB::query("SELECT * FROM agenda where id = %i" , $id);

  // echo "<pre>";
  // print_r($tabAgenda);
  // echo "</pre>";
  // exit;

  $temparray=array();
  $array_final=array();

    $temparray['id']=intval($tabRes[0]['id']);
		$temparray['nome']=$tabRes[0]['nome'];
		$temparray['endereco']=$tabRes[0]['endereco'];
		$temparray['telefone']=$tabRes[0]['telefone'];
		$temparray['obs']=$tabRes[0]['obs'];
		$temparray['ativo']=intval($tabRes[0]['ativo']);
    $temparray['pets']=$tabPets;
		array_push($array_final,$temparray);
  
  echo json_encode($temparray,JSON_UNESCAPED_UNICODE);
  exit;
}

// //U - Editar uma programacao
// if($acao=='editar'){
//   //$id = $_GET['id'] ?? '';
//   $ativo = $_POST['ativo'] ?? 0;
//   //$_POST['ativo'] == 1 ? $ativo=1 : $ativo=0;

//   DB::query("UPDATE clientes SET nome=%s, endereco=%s, telefone=%s, obs=%s, ativo=%s WHERE id=%i",
//   $_POST['nome'],
//   $_POST['endereco'],
//   $_POST['telefone'],
//   $_POST['obs'],
//   $ativo,
//   $_POST['editar_id']);
//   //header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?acao=sucesso' . strlen($_SERVER['QUERY_STRING'])>=1 ? $_SERVER['QUERY_STRING'] : '');
//   if($_SERVER['SCRIPT_NAME']=='clientes.php'){
//     header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?acao=sucesso');
//   } else {
//     header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?acao=sucesso&id=' . $_POST['editar_id']);
//   }
  
// }

//D - Apagar um programacao
if($acao=='deletaragenda'){
  echo 'xxxx';
  $id = $_GET['id'] ?? '';
  $idcliente = $_GET['idcliente'] ?? '';
  $callback = $_GET['callback'] ?? '';

  DB::query("Delete from agenda WHERE id=%i", $id);
  //header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?id=' . $_GET['idcliente'] . '&mensagem=sucesso');
  $callback<>'' ? header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?id=' . $_GET['idcliente'] . '&mensagem=sucesso') : null;
}

?>