$(document).ready(() => {
  this.getProducts();
});

$("#add-product").click(() => {
  window.location.replace("cadastro-produto.php");
});

$("#input-search").on("input", e => {
  this.getProducts(e.target.value);
});

removeProduct = async productId => {
  const requestInfo = {
    method: "DELETE"
  };

  await fetch(
    `controllers/product-controller.php?op=delete&productid=${productId}`,
    requestInfo
  );

  await this.getProducts();
};

changeProduct = productId => {
  window.location.replace(`cadastro-produto.php?id=${productId}`);
};

getProducts = async (filter = "") => {
  $("#table > tbody > tr").remove();
  const url = !!filter
    ? `controllers/product-controller.php?op=get&filtertype=name&filter=${filter}`
    : "controllers/product-controller.php?op=get";

  const response = await fetch(url);
  const { products } = await response.json();

  const productsView = products.map((product, index) => render(index, product));
  $("#table > tbody").append(productsView);
};

render = (index, product) =>
  `<tr>
        <th scope="row">${index + 1}</th>
        <td>${product.name}</td>
        <td>${product.author}</td>
        <td>${product.quantity}</td>
        <td id="price">R$ ${product.price}</td>
        <td><button class="btn btn-outline-primary" onclick="changeProduct(${
          product.productId
        })">Alterar</button></td>
        <td><button class="btn btn-outline-primary" onclick="removeProduct(${
          product.productId
        })" id="btn-remove">Remover</button></td>
    </tr>`;
