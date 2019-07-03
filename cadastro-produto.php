<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include "head.php"; ?>
  <link href="css/cadastro-produto.css" rel="stylesheet">
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
          <div class="card-body">
            <h5 class="card-title text-center">Cadastro produto</h5>
            <form id="form-product" enctype="multipart/form-data" class="form-signin">
              <div class="form-group mb-4">
                <label for="name">Nome: *</label>
                <input type="text" id="name" maxlength="70" class="form-control" required autofocus>
                <div class="invalid-feedback">
                  Por favor, informe um nome válido.
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="author">Autor: *</label>
                <input type="text" id="author" maxlength="70" class="form-control">
                <div class="invalid-feedback">
                  Por favor, informe um autor válido.
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="description">Descrição: *</label>
                <input type="text" id="description" maxlength="255" class="form-control" required>
                <div class="invalid-feedback">
                  Por favor, informe uma descrição válida.
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="category">Categoria: *</label>
                <select id="category" class="custom-select" required>
                  <option selected value="">Selecione uma categoria</option>
                  <option value="HQs">HQs</option>
                  <option value="Literatura Brasileira">Literatura Brasileira</option>
                  <option value="Literatura Estrangeira">Literatura Estrangeira</option>
                  <option value="Politica">Política</option>
                  <option value="Romance">Romance</option>
                  <option value="Suspense">Suspense</option>
                  <option value="Terror">Terror</option>
                </select>
              </div>
              <div class="form-group mb-4">
                <label for="quantity">Quantidade em estoque: *</label>
                <input type="number" id="quantity" class="form-control" required>
                <div class="invalid-feedback">
                  Por favor, informe uma quantidade válida.
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="price">Preço unitário: *</label>
                <input type="text" id="price" class="price form-control" required>
                <div class="invalid-feedback">
                  Por favor, informe um preço válido.
                </div>
              </div>
              <label for="file">Foto: *</label>
              <div class="custom-file mb-5">
                <input id="file" type="file" accept="image/png, image/jpeg, image/jpg"
                  class="custom-file-input input-file" id="file">
                <label class="custom-file-label" id="label-file" for="file">Escolher arquivo</label>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Apenas imagens no formato .JPEG, .JPG ou .PNG.
                </small>
                <div class="invalid-feedback">
                  Por favor, envie um arquivo válido.
                </div>
              </div>

              <button class="btn btn-lg btn-primary btn-block btn-submit mt-2 mb-2" type="submit">CADASTRAR
                PRODUTO</button>
              <a class="link-admin" href="admin.php">Ver produtos cadastrados</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include "scripts.php"; ?>
<script type="text/javascript" src="js/product.js"></script>

</html>