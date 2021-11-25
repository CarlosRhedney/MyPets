<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/icon" href="/res/site/img/logo.png">
  <title>MyPets</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/"><b>My</b>Pets</a>
  </div>
  <div class="text-center">
    Qual o motivo da exclusão da sua conta?
  </div>
  <div class="lockscreen-item">
    <form  action="/user/thanks" method="post">
      <div class="input-group">
        <div class="form-check" style="display:inline-block;">
          <input class="form-check-input" type="radio" name="sexo" id="cod1" value="cod1" required />
          <label class="form-check-label" for="cod1">Não sei como utilizar.</label>
        </div>
        <div class="form-check" style="display:inline-block;">
          <input class="form-check-input" type="radio" name="sexo" id="cod2" value="cod2" required />
          <label class="form-check-label" for="cod2">Não me sinto seguro.</label>
        </div>
        <div class="form-check" style="display:inline-block;">
          <input class="form-check-input" type="radio" name="sexo" id="cod3" value="cod3" required />
          <label class="form-check-label" for="cod3">Plataforma muito complicado.</label>
        </div>
        <div class="form-check" style="display:inline-block;">
          <input class="form-check-input" type="radio" name="sexo" id="cod4" value="cod4" required />
          <label class="form-check-label" for="cod4">Perco muito tempo na plataforma.</label>
        </div>
        <div class="form-check" style="display:inline-block;">
          <input class="form-check-input" type="radio" name="sexo" id="cod5" value="cod5" required />
          <label class="form-check-label" for="cod5">Adotei um animal.</label>
        </div>
      </div>
      <div align="center"><button type="button" class="btn btn-primary">Enviar</button></div>
    </form>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2021 <b><a href="/" class="text-black">MyPets </a></b><span class="fa fa-paw"></span><br>
    All rights reserved.
  </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
