$(document).ready(() => {
  const productId = window.location.search.slice(4);
  if (productId) {
    this.getProduct(productId);
  }
});

addCart = async productId => {
  const clientId = localStorage.getItem("@id");
  let shoppingCartList =
    JSON.parse(localStorage.getItem(`shoppingCartList${clientId}`)) || [];
  console.log(shoppingCartList);
  shoppingCartList.push({ productId, quantity: 1 });
  localStorage.setItem(
    `shoppingCartList${clientId}`,
    JSON.stringify(shoppingCartList)
  );
  window.location.replace("carrinho.php");
};

getProduct = async productId => {
  const response = await fetch(
    `controllers/product-controller.php?op=get&filtertype=id&filter=${productId}`
  );
  const { products } = await response.json();
  console.log(products[0]);
  const productView = this.render(products[0]);
  $("#row").append(productView);
};

render = product =>
  `<div class="col-lg-6 col-md-12">
    <div class="card product-button">
        <div href="${product.link}" class="product-content">
            <img class="product-img" src="${product.imageUrl}" alt="${
    product.name
  }">
            <div class="product-text">
                <p class="product-title">${product.name}</p>
                <p class="product-subtitle text-secondary">${product.author}</p>
                <p class="product-value">R$ ${product.price}</p>
                <button class="btn btn-outline-primary add-cart" onclick="addCart(${
                  product.productId
                })">COMPRAR</button>  
            </div>
        </div>
       
    </div>
</div>`;
