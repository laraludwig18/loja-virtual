<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include "head.php"; ?>
  <link href="css/cadastro.css" rel="stylesheet">
</head>

<body class="main">
  <div id="alert" class="alert alert-danger fade show d-none" role="alert">Erro</div>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Cadastro</h5>
            <form id="form-client" class="form-signin">
              <div class="form-label-group">
                <input type="text" id="name" maxlength="70" class="form-control" autofocus>
                <label for="name">Nome completo *</label>
                <div class="invalid-feedback">
                  Por favor, informe um nome válido.
                </div>
              </div>
              <div class="form-label-group">
                <input type="email" id="email" maxlength="70" class="form-control">
                <label for="email">E-mail *</label>
                <div class="invalid-feedback">
                  Por favor, informe um email válido.
                </div>
              </div>
              <div class="form-label-group">
                <input type="text" data-mask="(00) 00000-0000" id="phoneNumber" class="form-control">
                <label for="phoneNumber">Telefone *</label>
                <div class="invalid-feedback">
                  Por favor, informe um telefone válido.
                </div>
              </div>
              <div class="form-label-group">
                <input type="text" id="cpf" data-mask="000.000.000-00" class="form-control">
                <label for="cpf">CPF *</label>
                <div class="invalid-feedback">
                  Por favor, informe um cpf válido.
                </div>
              </div>
              <div class="form-label-group">
                <input type="text" id="address" maxlength="255" class="form-control" required>
                <label for="address">Endereço *</label>
                <div class="invalid-feedback">
                  Por favor, informe um endereço válido.
                </div>
              </div>
              <div class="form-label-group">
                <input type="date" id="birthDate" class="form-control" min="1920-04-01"
                  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                <label for="date">Data de Nascimento *</label>
                <div class="invalid-feedback">
                  Por favor, informe uma data de nascimento válida.
                </div>
              </div>
              <hr>
              <div class="form-label-group">
                <input type="password" id="password" maxlength="12" class="form-control"
                  aria-describedby="passwordHelpBlock">
                <label for="password">Password *</label>
                <div class="invalid-feedback">
                  Por favor, informe uma senha válida.
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted help-password">
                  Sua senha deve ter entre 6 e 12 caracteres.
                </small>
              </div>
              <div class="form-label-group">
                <input type="password" id="confirmPassword" maxlength="12" class="form-control">
                <label for="confirmPassword">Confirm password</label>
                <div class="invalid-feedback">
                  As senhas não coincidem.
                </div>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">CRIAR
                CONTA</button>
              <a class="d-block text-center mt-2 small" href="login.php">Já possuo conta</a>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/client.js"></script>

</html>