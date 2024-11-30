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

include('./includes/exe_funcoes_cliente.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Adri Pet Center - Clientes</title>

    <?php include "./includes/inc_header.php"; ?>
    <?php include "./includes/inc_style.php"; ?>

  </head>
  <body>
    
  <?php include "./includes/inc_navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include './includes/inc_menu.php'; ?>
    <?php include './includes/inc_clientes.php'; ?>
    
  </div>
</div>

<!--Modal Cadastrar-->
<!--Modal Cadastrar-->
<!--Modal Cadastrar-->
<!--Modal Cadastrar-->
<div class="modal fade" id="cadastraCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="./clientes.php?acao=cadastrar" class="needs-validation">
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
        <div class="row">
        <label for="cidade" class="col-form-label">Dia do Banho</label>
          <div class="col mb-3 d-flex justify-content-between">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="diabanho1" value="1" name='diabanho'>
              <label class="form-check-label" for="inlineCheckbox1">Segunda</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="diabanho2" value="2" name='diabanho'>
              <label class="form-check-label" for="inlineCheckbox1">Terça</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="diabanho3" value="3" name='diabanho'>
              <label class="form-check-label" for="inlineCheckbox1">Quarta</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="diabanho4" value="4" name='diabanho'>
              <label class="form-check-label" for="inlineCheckbox1">Quinta</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="diabanho5" value="5" name='diabanho'>
              <label class="form-check-label" for="inlineCheckbox1">Sexta</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="diabanho6" value="6" name='diabanho'>
              <label class="form-check-label" for="inlineCheckbox1">Sábado</label>
            </div>

            
          </div>
        </div>
        <hr>
        <h6 class="d-flex justify-content-between">Pet <button type="button" class="btn btn-primary btn-sm" id="addpet">+</button></h6>
        <div class="row" id="formpet">  
          <div class="col-md-6 mb-1">
            <label for="nome" class="col-form-label">Nome</label>
            <input type="text" name="nomepet[]" class="form-control" id="nomepet">
          </div>
          <div class="col-md-2 mb-1">
            <label for="valorpacote" class="col-form-label">Valor Pacote</label>
            <input type="text" name="valorpacote[]" class="form-control" id="valorpacote" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
          </div>
          <div class="col-md-2 mb-1">
            <label for="frequencia" class="col-form-label">Frequência</label>
            <select class="form-select" aria-label="Default select example" name="frequencia[]" id="frequencia">
              <option value="-"></option>
                <option value="7">Semanal (7/7)</option>
                <option value="15">Quinzenal (15/15)</option>
                <option value="30">Mensal (30/30)</option>
            </select>
          </div>
          <div class="col-md-2 mb-1">
            <label for="raca" class="col-form-label">Raça</label>
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

      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" value="enviar" class="btn btn-primary">Cadastrar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



<?php include './includes/inc_modaiscliente.php'; ?>


<?php include './includes/inc_footer.php'; ?>

<script src='./js/frag_modaleditarcliente.js'></script>

<?php include './includes/frag_modalsucesso.php'; ?>

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

  </body>
</html>
