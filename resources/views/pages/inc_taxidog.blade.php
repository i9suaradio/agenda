<?php
$restabClientes = DB::query("SELECT * FROM clientes order by diabanho asc, clientes.nome asc");
?>
<main class="col ms-sm-auto">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Taxidog</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cadastraCliente">
          <i class="fa-solid fa-plus me-2"></i>
             Cadastrar
          </button>
        </div>
      </div>
      
      <span>Gerar lista de Taxi Dog</span>

      <div class="p-1">

        <form target="_blank" method="post" action="./listataxidog.php">
        <div class="col">
          
          <div class="">
            <input type="text" id="caltaxi" name='data' class="d-none">
          </div>
          
          <div class="mt-4">
            <button type="submit" value="enviar" class="btn btn-primary">Gerar Lista Taxi Dog</button>
          </div>

        </div>
        
      </div>
    </main>
    
    <script>
        function rmydays(date) {
            return (date.getDay() === 0);
          }
      var cal = $("#caltaxi").flatpickr({
        locale: 'pt',
        defaultDate: "today",
        mode: "single",
        dateFormat: "Y-m-d",
        inline: 'true',
        disable: [rmydays ],
        theme: 'material_green',
        onChange: function(selectedDates, dateStr, instance) {
          
        },
      });
    </script>