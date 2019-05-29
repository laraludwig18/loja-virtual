<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Cadastro</title>
   <link rel="shortcut icon" href="img/icon.png"/>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="shrink-to-fita384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <!-- Custom styles for this template -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/cadastro.css" rel="stylesheet">  
</head>
<body class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                  </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Cadastro</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="inputName" class="form-control" required autofocus>
                                <label for="inputName">Nome completo</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" required autofocus>
                                <label for="inputEmail">E-mail</label>
                            </div>
                            <div class="form-label-group">
                                <input type="number" id="inputTelefone" class="form-control" required autofocus>
                                <label for="inputTelefone">Telefone</label>
                            </div>
                            <div class="form-label-group">
                                <input type="number" id="inputCPF" class="form-control" required autofocus>
                                <label for="inputCPF">CPF</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="inputEndereco" class="form-control" required autofocus>
                                <label for="inputEndereco">Endereço</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="inputNasc" class="form-control" required autofocus>
                                <label for="inputNasc">Data de Nascimento</label>
                            </div>
                            <hr>
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="password" id="inputConfirmPassword" class="form-control" required>
                                    <label for="inputConfirmPassword">Confirm password</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
                                <a class="d-block text-center mt-2 small" href="login.php">Logar</a>
                            <hr class="my-4">
					 </form>
                  </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>