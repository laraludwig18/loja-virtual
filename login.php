<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include "head.php"; ?>
  <link href="css/login.css" rel="stylesheet">
</head>

<body class="main">
  <?php
        $error = "";
        if(isset($_GET['error'])){
            $error = '<div id="alert" class="alert alert-danger fade show" role="alert">Usuário ou senha inválidos.</div>';
        }
        echo $error;
    ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form id="form-login" class="form-signin" action="controllers/login-controller.php" method="post">
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu e-mail"
                  maxlength="70" required autofocus>
                <label for="email">E-mail</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Digite sua senha"
                  maxlength="12" required>
                <label for="password">Senha</label>
              </div>
              <a href="index.html">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">ACESSAR
                  MINHA CONTA</button>
                <a class="text-center nav-link" href="cadastro-cliente.php">Criar conta</a>
                <a class="text-center nav-link" href="#">Esqueci minha senha</a>
                <hr class="my-4">
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/login.js"></script>

</html>