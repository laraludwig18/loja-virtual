$(document).ready(() => {
  this.getProducts();
});

getProducts = async () => {
  const response = await fetch("controllers/product-controller.php?op=get");
  const { products, clientId } = await response.json();
  if (!localStorage.getItem("@id")) {
    localStorage.setItem("@id", clientId);
  }
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
                        <img class="product-img" src="${imageUrl}" alt="${name}">
                        <div class="product-text">
                            <p class="product-title">${name}</p>
                            <p class="product-subtitle text-secondary">${author}</p>
                            <p class="product-value">R$ ${price}</p>
                        </div>
                    </a>
                    <button class="btn btn-outline-primary add-cart" onclick="addCart(${
                      product.productId
                    })">ADICIONAR AO CARINHO</button>
                </div>
            </div>`;
};
