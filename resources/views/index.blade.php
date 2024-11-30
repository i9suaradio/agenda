@extends('layouts.index')

@section('content')

<div class="form-signin w-100 m-auto">
  <form method="post" action="./includes/exec_login.php?acao=login">
    <img class="mb-4" width="250" src="{{ asset('/storage/imgs/logo.png') }}" alt="" >
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Usuário" required>
      <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating">
      <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha" required>
      <label for="floatingPassword">Senha</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
  </form>
</div>


@endsection