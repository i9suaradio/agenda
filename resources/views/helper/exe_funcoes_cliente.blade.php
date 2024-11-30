<?php

//C - Cadastrar um cliente

if($acao=='cadastrar'){



  DB::insert('clientes', [

    'nome' => $_POST['nome'],

    'endereco' => $_POST['endereco'],

    'telefone' => $_POST['telefone'],

    'obs' => $_POST['obs'],

    'diabanho' => $_POST['diabanho'],

    'ativo' => 1

  ]);

  $idusuario = DB::insertId();

  if(!$_POST['nomepet'][0]==''){

    $i=0;

    foreach ($_POST['nomepet'] as $valor) {

      DB::insert('pets', [

        'idcliente' => $idusuario,

        'nome' => $_POST['nomepet'][$i],

        'valorpacote' => $_POST['valorpacote'][$i],

        'frequencia' => $_POST['frequencia'][$i],

        'raca' => $_POST['raca'][$i]

      ]);

      $i++;

    }

  }

  header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?mensagem=sucesso');

}



//R - Informações de um cliente

if($acao=='info'){

  $id = $_GET['id'];

  $tabRes = DB::query("SELECT * FROM clientes where id = %i" , $id);

  $tabPets = DB::query("SELECT * FROM pets where idcliente = %i" , $id);



  // echo "<pre>";

  // print_r($tabPets);

  // echo "</pre>";

  // exit;



  $temparray=array();

  $array_final=array();



    $temparray['id']=intval($tabRes[0]['id']);

		$temparray['nome']=$tabRes[0]['nome'];

		$temparray['endereco']=$tabRes[0]['endereco'];

		$temparray['telefone']=$tabRes[0]['telefone'];

		$temparray['obs']=$tabRes[0]['obs'];

		$temparray['diabanho']=intval($tabRes[0]['diabanho']);

		$temparray['ativo']=intval($tabRes[0]['ativo']);

    $temparray['pets']=$tabPets;

		array_push($array_final,$temparray);

  

  echo json_encode($temparray,JSON_UNESCAPED_UNICODE);

  exit;

}



//Informacoes de um pet

if($acao=='infopet'){

  $id = $_GET['id'];

  $tabRes = DB::query("SELECT * FROM pets where id = %i" , $id);



  // echo "<pre>";

  // print_r($tabPet);

  // echo "</pre>";

  // exit;



  $temparray=array();

  $array_final=array();



    $temparray['id']=intval($tabRes[0]['id']);

    $temparray['idcliente']=intval($tabRes[0]['idcliente']);

		$temparray['nome']=$tabRes[0]['nome'];



		$temparray['raca']=$tabRes[0]['raca'];

		$temparray['observacao']=$tabRes[0]['observacao'];

		$temparray['valorpacote']=$tabRes[0]['valorpacote'];

		$temparray['frequencia']=intval($tabRes[0]['frequencia']);

		$temparray['taxidog']=intval($tabRes[0]['taxidog']);

		array_push($array_final,$temparray);

  

  echo json_encode($temparray,JSON_UNESCAPED_UNICODE);

  exit;

}



//U - Editar um cliente

if($acao=='editar'){

  //$id = $_GET['id'] ?? '';

  $ativo = $_POST['ativo'] ?? 0;

  //$_POST['ativo'] == 1 ? $ativo=1 : $ativo=0;



  DB::query("UPDATE clientes SET nome=%s, endereco=%s, telefone=%s, diabanho=%s, obs=%s, ativo=%s WHERE id=%i",

  $_POST['nome'],

  $_POST['endereco'],

  $_POST['telefone'],

  $_POST['diabanho'],

  $_POST['obs'],

  $ativo,

  $_POST['editar_id']);

  //header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?acao=sucesso' . strlen($_SERVER['QUERY_STRING'])>=1 ? $_SERVER['QUERY_STRING'] : '');

  if($_SERVER['SCRIPT_NAME']=='clientes.php'){

    header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?mensagem=sucesso');

  } else {

    header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?mensagem=sucesso&id=' . $_POST['editar_id']);

  }

  

}



//U - Editar um PET

if($acao=='editarpet'){

  

  $taxidog = $_POST['taxidog'] ?? 0;



  DB::query("UPDATE pets SET nome=%s, raca=%s, observacao=%s, valorpacote=%s, frequencia=%s, taxidog=%i WHERE id=%i",

  $_POST['nomepet'],

  $_POST['raca'],

  $_POST['observacao'],

  $_POST['valorpacote'],

  $_POST['frequencia'],

  $taxidog,

  $_POST['idpet']);



  //header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?acao=sucesso' . strlen($_SERVER['QUERY_STRING'])>=1 ? $_SERVER['QUERY_STRING'] : '');

  if($_POST['retorno']=='/clientes.php'){

    header('Location: ./clientes.php?mensagem=sucesso');

  } else {

    header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?mensagem=sucesso&id=' . $_POST['idcliente']);

  }

  

}



//D - Apagar um cliente

if($acao=='deletar'){

  DB::query("Delete from clientes WHERE id=%i", $_GET['id']);

  header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?mensagem=sucesso');

}



//U - Editar uma agenda GET

if($acao=='editaagenda'){

  $id = $_GET['id'] ?? '';

  $data = $_GET['data'] ?? null;

  $servico = $_GET['servico'] ?? null;

  

  if($_GET['status']<>'arquivado'){

    if($_GET['status']=='pago'){

      DB::query("UPDATE agenda SET status=%s, datapago=now() WHERE id=%i", $_GET['status'], $_GET['idagenda']);

    }else{

      DB::query("UPDATE agenda SET status=%s WHERE id=%i", $_GET['status'], $_GET['idagenda']);

    }

    

  }else{

    DB::query("UPDATE agenda SET arquivado=1 WHERE id=%i", $_GET['idagenda']);

  }

  

  if($data){

    header("Location: " . $_SERVER['SCRIPT_NAME'] . "?data=$data&servico=$servico");

  }else{

    header("Location: " . $_SERVER['SCRIPT_NAME'] . "?id=$id");

  }

}



if($acao=='editaagendapost'){

  $id = $_GET['id'] ?? '';

  $data = $_GET['data'] ?? null;



  if($_GET['status']<>'arquivado'){

    echo '1';

    if(!$data){

      DB::query("UPDATE agenda SET status=%s, datapago='0000-00-00' WHERE id=%i", $_GET['status'], $_GET['idagenda']);

    }else{

      echo '2';

      DB::query("UPDATE agenda SET status='pago', datapago=%s WHERE id=%i", $data, $_GET['idagenda']);

    }

  }else{

    echo '3';

    echo $_GET['idagenda'];

    DB::query("UPDATE agenda SET arquivado=1 WHERE id=%i", $_GET['idagenda']);

  }



  echo 'ok';

  exit;

}



//add um item

if($acao=='addpet'){

  $id = $_GET['id'] ?? '';



  $i=0;

  foreach ($_POST['nomepet'] as $valor) {

    DB::insert('pets', [

      'idcliente' => $id,

      'nome' => $_POST['nomepet'][$i],

      'valorpacote' => $_POST['valorpacote'][$i],

      'raca' => $_POST['raca'][$i],

      'frequencia' => $_POST['frequencia'][$i],

      'taxidog' => $_POST['taxidog'][$i] ? 1 : 0,

      

    ]);

    $i++;

  }

  

  header("Location: " . $_SERVER['SCRIPT_NAME'] . "?id=$id&mensagem=sucesso");

}



//add um item

if($acao=='additem'){

  $id = $_GET['id'] ?? '';

  DB::insert('itens', [

    //'idagenda' => $_POST['idagenda'],

    'idcliente' => $_POST['idcliente'],

    'idpet' => $_POST['idpet'],

    'descricao' => $_POST['descricao'],

    'valor' => $_POST['valor'],

    'pagamentoparcial' => $_POST['pagamentoparcial'],

    'data' => $_POST['data'],

    'pago' => 0

  ]);

  

  header("Location: " . $_SERVER['SCRIPT_NAME'] . "?id=$id&mensagem=sucesso");

}



//D - Apagar um item

if($acao=='deletaritem'){

  DB::query("Delete from itens WHERE id=%i", $_GET['id']);

  header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?id=' . $_GET['idcliente'] . 'mensagem=sucesso');

}



if($acao=='deletarpet'){

  $id = $_GET['id'] ?? '';

  $idpet = $_GET['idpet'] ?? '';



  DB::query("Delete from pets WHERE id=%i", $idpet);

  header('Location: ' . $_SERVER['SCRIPT_NAME'] . "?id=$id&mensagem=sucesso");

}



//U - Editar uma programacao

if($acao=='editaritem'){

  

  $iditem = $_POST['iditem'] ?? '';

  $idcliente = $_GET['id'] ?? '';

  

  $descricao = $_POST['descricao'] ?? '';

  $valor = $_POST['valor'] ?? '';

  $pagamentoparcial = $_POST['pagamentoparcial'] ?? '';

  $data = $_POST['calendario'] ?? '';

  

  //fazer um select para quando o valor do parcial for =ou> que o valor devido, já baixar o produto e dar uma mensagem especifica

  //parei aqui

  DB::query("UPDATE itens SET descricao=%s, valor=%s, pagamentoparcial=%s, data=%s WHERE id=%i", $descricao, $valor, $pagamentoparcial, $data, $iditem);

    

  header("Location: " . $_SERVER['SCRIPT_NAME'] . "?id=$idcliente&mensagem=sucesso");



}



if($acao=='editaitem'){



  $idcliente = $_GET['id'] ?? '';

  $iditem = $_GET['iditem'] ?? '';

  $status = $_GET['status'] ?? '';



  if($status=='pago'){

    DB::query("UPDATE itens SET pago=%i, datapago=now() WHERE id=%i", 1, $iditem);

  } elseif ($status=='arquivado'){

    DB::query("UPDATE itens SET  arquivado=1 WHERE id=%i", $iditem);

  }

  

    

  header("Location: " . $_SERVER['SCRIPT_NAME'] . "?id=$idcliente");

}



if($acao=='somacliente'){



  $id = $_GET['id'] ?? '';



  //Banho e Tosa

  $totalAgendado = 0;

  $totalExecutado = 0;

  $totalPago = 0;

  $restabPets = DB::query("SELECT * FROM pets where idcliente = %i order by nome asc", $id);

  foreach ($restabPets as $tabPet){

    $restabAgenda = DB::query("SELECT agenda.*, pets.nome, pets.observacao, pets.frequencia, pets.valorpacote FROM `agenda` inner join pets on pets.id = agenda.idpet and agenda.idcliente = %i where agenda.arquivado = 0 and agenda.idpet = %i order by nome asc, data asc , idpet asc", $id, $tabPet['id'] );

    foreach ($restabAgenda as $tabAgenda){

      $tabAgenda['status']=='agendado' ? $totalAgendado += $tabAgenda['valor'] : $totalAgendado += 0;

      $tabAgenda['status']=='executado' ? $totalExecutado += $tabAgenda['valor'] : $totalExecutado += 0;

      $tabAgenda['status']=='pago' ? $totalPago += $tabAgenda['valor'] : $totalPago += 0;

    }

  }



  //Itens

  $totalItens = 0;

  $pagoItens = 0;

  $restabItensPets = DB::query("SELECT itens.*, pets.nome, pets.observacao FROM itens inner join pets on pets.id = itens.idpet where itens.idcliente = %i and arquivado = 0 order by data asc , idpet asc", $id );

  foreach ($restabItensPets as $tabItensPets){

    $totalItens += $tabItensPets['valor'];

    $pagoItens +=  $tabItensPets['pagamentoparcial'];

  }

  

  //Cospe json

  $temparray=array();



    $temparray['pago']=formatamoeda($totalPago);

		$temparray['executado']=formatamoeda($totalExecutado);

		$temparray['agendado']=formatamoeda($totalAgendado);



		$temparray['pagoparcial']=formatamoeda($pagoItens);

		$temparray['totalitens']=formatamoeda($totalItens-$pagoItens);

		  

  echo json_encode($temparray,JSON_UNESCAPED_UNICODE);

  exit;



}



?>