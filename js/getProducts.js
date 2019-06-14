$(document).ready(() => {
  this.getProducts();
});

getProducts = async () => {
  const response = await fetch("controllers/product-controller.php?op=get");
  const { products } = await response.json();
  const productsView = products.map(product => render(product));
  $("#row").append(productsView);
};

render = product =>
  `<div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top"
                                    src="${product.imageUrl}"
                                    alt="${product.name}"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="produto.php">${product.name}</a>
                    </h4>
                    <h5>R$${product.price}</h5>
                    <p class="card-text">${product.description}</p>
                </div>
        </div>
    </div>`;
