<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!$_SESSION["admin_id"]) {
  header("Location: index.php");
  exit;
}

include("./includes/meekrodb.2.4.class.php");
include("./includes/funcoes.php");

$id = $_GET['id'] ?? '';
$acao = $_GET['acao'] ?? '';
$mensagem = $_GET['mensagem'] ?? '';
$tipo = $_GET['tipo'] ?? '';

//Includes de fragmentos de codigo
include_once('./includes/exe_funcoes_agenda.php');
include_once('./includes/exe_funcoes_cliente.php');

//Selects
$restabCliente = DB::query("SELECT * FROM clientes where id=%i", $id);
$restabPets = DB::query("SELECT * FROM pets where idcliente = %i order by nome asc", $restabCliente[0]['id']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Adri Pet Center</title>

    <?php include "./includes/inc_header.php"; ?>
    <?php include "./includes/inc_style.php"; ?>

  </head>
  <body>
    
  <?php include "./includes/inc_navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include './includes/inc_menu.php'; ?>
    <?php include './includes/inc_cliente.php'; ?>

    
  </div>
</div>

<?php include './includes/inc_footer.php'; ?>

<!--Modal Cadastrar-->
<div class="modal fade" id="cadastraCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="./cliente.php?acao=cadastrar" class="needs-validation">
      <div class="modal-body">
      <h6>Dados do Cliente</h6>
      <div class="row">  
          <div class="col mb-3">
            <label for="cidade" class="col-form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" oninvalid="this.setCustomValidity('Insira um nome para o cliente.')" oninput="setCustomValidity('')" required>
          </div>
        </div>

        <div class="row">  
          <div class="col-md-8 mb-3">
            <label for="cidade" class="col-form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="endereco" >
          </div>
          <div class="col-md-4 mb-3">
            <label for="cidade" class="col-form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" >
          </div>
        </div>

        <div class="row">  
          <div class="col mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs"></textarea>
          </div>
        </div>

        <hr>

        <h6 class="d-flex justify-content-between">Pet <button type="button" class="btn btn-primary btn-sm" id="addpet">+</button></h6>
        
        <div class="row" id="formpet">  
          <div class="col-md-10 mb-1">
            <label for="cidade" class="col-form-label">Nome</label>
            <input type="text" name="nomepet[]" class="form-control" id="nomepet" >
          </div>
          <div class="col-md-2 mb-1">
            <label for="cidade" class="col-form-label">Raça</label>
            <select class="form-select" aria-label="Default select example" name="raca[]" id="racapet">
              <option value="-"></option>
                <option value="Shih-tzu">Shih-tzu</option>
                <option value="Yorkshire">Yorkshire</option>
                <option value="Spitz">Spitz</option>
                <option value="Poodle">Poodle</option>
                <option value="Pinscher">Pinscher</option>
                <option value="SRD">SRD</option>
                <option value="Outro">Outro</option>
            </select>
          </div>
        </div>
        
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" value="enviar" class="btn btn-primary">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include './includes/inc_modaiscliente.php'; ?>

<script src='./js/frag_modaleditaragenda.js'></script>
<script src='./js/frag_modaleditarcliente.js'></script>
<script src='./js/frag_modaladditem.js'></script>

<?php include './includes/frag_modalsucesso.php'; ?>
<?php include './includes/inc_modalagendadodia.php'; ?>

<script src="./js/frag_modalagendadodia.js"></script>

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
</script>

  </body>
</html>
