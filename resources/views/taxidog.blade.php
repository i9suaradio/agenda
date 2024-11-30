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
    <title>Adri Pet Center - Taxidog</title>

    <?php include "./includes/inc_header.php"; ?>
    <?php include "./includes/inc_style.php"; ?>

  </head>
  <body>
    
  <?php include "./includes/inc_navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include './includes/inc_menu.php'; ?>
    <?php include './includes/inc_taxidog.php'; ?>
    
  </div>
</div>



<?php include './includes/inc_footer.php'; ?>
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
