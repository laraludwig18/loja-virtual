<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include "head.php"; ?>
    <link href="css/cadastro.css" rel="stylesheet">
</head>

<body class="main">
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
                                <input type="text" id="name" class="form-control" autofocus>
                                <label for="name">Nome completo</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="email" class="form-control">
                                <label for="email">E-mail</label>
                            </div>
                            <div class="form-label-group">
                                <input type="number" id="phoneNumber" class="form-control">
                                <label for="phoneNumber">Telefone</label>
                            </div>
                            <div class="form-label-group">
                                <input type="number" id="cpf" class="form-control">
                                <label for="cpf">CPF</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="address" class="form-control">
                                <label for="address">Endereço</label>
                            </div>
                            <div class="form-label-group">
                                <input type="date" id="birthDate" class="form-control">
                                <label for="date">Data de Nascimento</label>
                            </div>
                            <hr>
                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="confirmPassword" class="form-control">
                                <label for="confirmPassword">Confirm password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                type="submit">Cadastrar</button>
                            <a class="d-block text-center mt-2 small" href="login.php">Logar</a>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/registerClient.js"></script>

</html>