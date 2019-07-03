$(document).ready(() => {
  this.getProducts();
});

$("#input-search").on("input", e => {
  this.getProducts(e.target.value);
});

getProducts = async (filter = "") => {
  let url = "";
  if (window.location.search) {
    const category = window.location.search.slice(10);
    $("#category-group a").removeClass("selected");
    $(`#${category}`).addClass("selected");
    url = filter
      ? `controllers/product-controller.php?op=get&category=${category}&filtertype=name&filter=${filter}`
      : `controllers/product-controller.php?op=get&filtertype=category&filter=${category}`;
  } else {
    url = filter
      ? `controllers/product-controller.php?op=get&filtertype=name&filter=${filter}`
      : `controllers/product-controller.php?op=get`;
  }

  const response = await fetch(url);
  const { products, clientId } = await response.json();

  if (!localStorage.getItem("@id")) {
    localStorage.setItem("@id", clientId);
  }

  this.showProducts(products);
};

showProducts = products => {
  $("#container-cards > div").remove();
  const productsView = products.map(product => render(product));
  $("#container-cards").append(productsView);
};

addCart = async productId => {
  const clientId = localStorage.getItem("@id");
  let shoppingCartList =
    JSON.parse(localStorage.getItem(`shoppingCartList${clientId}`)) || [];
  shoppingCartList.push({ productId, quantity: 1 });
  localStorage.setItem(
    `shoppingCartList${clientId}`,
    JSON.stringify(shoppingCartList)
  );
};

render = product => {
  const { imageUrl, name, author, price, productId } = product;
  const link = `produto.php?id=${productId}`;

  return `<div class="col-lg-4 col-md-6 mb-4">
                <div class="card product-button">
                    <a href="${link}" class="product-content">
                        <img class="product-img ml-2" src="${imageUrl}" alt="${name}">
                        <div class="product-text">
                            <p class="product-title">${name}</p>
                            <p class="product-subtitle text-secondary">${author}</p>
                            <p id="price" class="product-value">R$ ${price}</p>
                        </div>
                    </a>
                    <button class="btn btn-outline-primary add-cart" onclick="addCart(${
                      product.productId
                    })">ADICIONAR AO CARINHO</button>
                </div>
            </div>`;
};
