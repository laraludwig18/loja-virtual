<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include "head.php";?>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/contato.css" rel="stylesheet">
</head>

<body class="main">
    <div id="alert" class="alert alert-danger fade show d-none" role="alert">Erro</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-xl-5 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Fale Conosco</h5>
                        <form id="form-contato" method= "POST" class="form-signin">
                            <div class="form-label-group">
                                <input type="text" name="tfNome" id="name" maxlength="70" class="form-control" autofocus>
                                <label for="name" id="labelFormContato">Nome completo</label>
                                <div class="invalid-feedback">
                                    Por favor, informe um nome válido.
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input type="email" name="tfEmail" id="email" maxlength="70" class="form-control">
                                <label for="email" id="labelFormContato">E-mail</label>
                                <div class="invalid-feedback">
                                    Por favor, informe um email válido.
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input type="text" name="tfMensagem" id="mensagem" maxlength="70" class="form-control">
                                <label for="mensagem" id="labelFormContato">Mensagem</label>
                                <div class="invalid-feedback">
                                    Por favor, digite sua mensagem.
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Enviar</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
<?php include "scripts.php";?>
<script type="text/javascript" src="js/contact.js"></script>

</html>