<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include "head.php"; ?>
    <link href="css/cadastro.css" rel="stylesheet">
</head>

<body>
    <?php 
        session_start();
        if(!$_SESSION["admin"]) return header("Location: login.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Produto</h5>
                        <form id="form-product" enctype="multipart/form-data" class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="name" maxlength="70" class="form-control" autofocus>
                                <label for="name">Nome</label>
                                <div class="invalid-feedback">
                                    Por favor, informe um nome válido.
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="description" maxlength="255" class="form-control">
                                <label for="description">Descrição</label>
                                <div class="invalid-feedback">
                                    Por favor, informe uma descrição válida.
                                </div>
                            </div>
                            <select class="custom-select">
                                <option selected>Abra este menu select</option>
                                <option value="1">Um</option>
                                <option value="2">Dois</option>
                                <option value="3">Três</option>
                            </select>
                            <div class="form-label-group">
                                <input type="number" id="quantity" class="form-control">
                                <label for="quantity">Quantidade em estoque</label>
                                <div class="invalid-feedback">
                                    Por favor, informe uma quantidade válida.
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="price" class="price form-control">
                                <label for="price">Preço unitário</label>
                                <div class="invalid-feedback">
                                    Por favor, informe um preço válido.
                                </div>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file">
                                <label class="custom-file-label" for="file">Escolher arquivo</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">CADASTRAR
                                PRODUTO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/product.js"></script>

</html>