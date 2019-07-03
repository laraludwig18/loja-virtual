<header id="cabecalho">
  <nav class="navbar navbar-dark py-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1" aria-expanded="false">
      <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <?php   
        if(isset($_SESSION["client"])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="util/logout.php">Sair</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.php">Contate-nos</a>
        </li>
      </ul>
    </div>
  </nav>

  <h2 id="title">Loja de livros</h2>
  <?php   
  if(isset($_SESSION["client"])) { ?>
  <a href="carrinho.php"><img id="carrinho" class="shopping-cart" src="images/shoppingCartIcon.png" alt="carrinho"></a>
  <?php } ?>
  </nav>
</header>