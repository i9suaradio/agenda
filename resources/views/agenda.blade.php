<?php
session_start();
if(!$_SESSION["admin_id"]) {
  header("Location: index.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Adri Pet Center - Agenda</title>
    
    <script src='./js/fullcalendar/dist/index.global.min.js'></script>
    <script src='./js/fullcalendar/packages/core/locales-all.global.js'></script>

    <?php include "./includes/inc_header.php"; ?>
    <?php include "./includes/inc_style.php"; ?>

    <script src="./js/calendar.js"></script>
    
  </head>
  <body>
  
  <?php include "./includes/inc_navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include './includes/inc_menu.php'; ?>
    <?php include './includes/inc_agenda.php'; ?>
    
  </div>
</div>


<?php include './includes/inc_footer.php'; ?>

  </body>
</html>
