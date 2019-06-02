<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include "head.php"; ?>
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Digite seu e-mail"
                                    required autofocus>
                                <label for="inputEmail">E-mail</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control"
                                    placeholder="Digite sua senha" required>
                                <label for="inputPassword">Senha</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Lembrar senha</label>
                            </div>
                            <a href="index.html">
                                <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                    type="submit">Login</button>
                                <a class="text-center nav-link" href="cadastro-cliente.php">Cadastre-se</a>
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

</html>