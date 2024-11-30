<div class="d-flex d-none d-lg-block justify-content-between flex-column flex-shrink-0 p-3 bg-body-tertiary vh-100" style="width: 180px;">
    <a href="./dashboard.php"
      class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <img src="./imgs/logo.png" width="200" alt="">
    </a>
    <hr>
    <ul class="nav flex-column mb-auto">
      <li>
        <a href="./dashboard.php" class="nav-link active link-body-emphasis">
          <i class="fa-solid fa-house"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="./clientes.php" class="nav-link link-body-emphasis">
          <i class="fa-solid fa-users"></i>
          Clientes
        </a>
      </li>
      <li class='d-none'>
        <a href="./pets.php" class="nav-link link-body-emphasis">
          <i class="fa-solid fa-dog"></i>
          Pets
        </a>
      </li>
      <li>
        <a href="./agenda.php" class="nav-link link-body-emphasis">
          <i class="fa-solid fa-calendar"></i>
          Agenda
        </a>
      </li>
      <li>
        <a href="./agendadodia.php" class="nav-link link-body-emphasis">
          <i class="fa-solid fa-calendar-check"></i>
          Ag. do Dia
        </a>
      </li>
      <li>
        <a href="./taxidog.php" class="nav-link link-body-emphasis">
          <i class="fa-solid fa-car"></i>
          Taxi Dog
        </a>
      </li>
      <hr>
      <li>
        <a href="./includes/exec_login.php?acao=logoff" class="nav-link link-body-emphasis">
          <i class="fa-solid fa-right-from-bracket"></i>
          Sair
        </a>
      </li>
    </ul>

    <div class="dropdown d-none">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
  <!-- d-lg-none -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none" aria-label="Fifth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Adri Pet Center</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
        aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li>
            <a href="./dashboard.php" class="nav-link active link-body-emphasis">
              <i class="fa-solid fa-house"></i>
              Dashboard
            </a>
          </li>
          <li>
            <a href="./clientes.php" class="nav-link link-body-emphasis">
              <i class="fa-solid fa-users"></i>
              Clientes
            </a>
          </li>
          <li>
            <a href="./pets.php" class="nav-link link-body-emphasis">
              <i class="fa-solid fa-dog"></i>
              Pets
            </a>
          </li>
          <li>
            <a href="./agenda.php" class="nav-link link-body-emphasis">
              <i class="fa-solid fa-calendar"></i>
              Agenda
            </a>
          </li>
          <hr>
          <li>
            <a href="./includes/exec_login.php?acao=logoff" class="nav-link link-body-emphasis">
              <i class="fa-solid fa-right-from-bracket"></i>
              Sair
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
