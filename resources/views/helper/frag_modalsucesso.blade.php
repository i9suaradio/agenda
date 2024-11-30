<?php if($mensagem=='sucesso') { ?>
    <script>
        $(document).ready(function() {
          Swal.fire({
            icon: 'success',
            title: 'Operação realizada com sucesso!',
            showConfirmButton: false,
            timer: 800
          })
        });
    </script>
    <?php } ?>