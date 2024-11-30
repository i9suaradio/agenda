<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("meekrodb.2.4.class.php");

$acao = $_GET['acao'] ?? '';

if (!isset($_SESSION)) session_start();

//Logoff
if($acao=='logoff'){
  //session_start();
  unset($_SESSION['admin_id']);
  unset($_SESSION['admin_idcadastro']);
  unset($_SESSION['admin_login']);
  unset($_SESSION['admin_tipo']);
  session_destroy();
  header("Location: ../index.php");
}

if($acao=='login'){
  $usuario = $_POST['usuario'];
  $senha = md5($_POST['senha']);
  $tabResultado = DB::queryFirstRow("SELECT * FROM usuarios where usuario = '$usuario' and senha = '$senha' and ativo=1");

  if($tabResultado){
    //print_r($tabResultado);
    
    // $timeout = 2;
    // ini_set( "session.gc_maxlifetime", $timeout );
    // ini_set( "session.cookie_lifetime", $timeout );
    // session_start();

    $_SESSION["admin_id"] = $tabResultado['id'];
    $_SESSION["admin_usuario"] = $tabResultado['usuario'];
    $_SESSION["admin_tipo"] = $tabResultado['tipo'];
    header("Location: ../dashboard.php");
  } else {
    header("Location: ../?acao=loginerro");  
  }
}