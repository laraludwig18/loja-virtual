$(document).ready(() => {
  this.getProducts();
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

getProducts = async () => {
  $("#table > tbody > tr").remove();
  const response = await fetch("controllers/product-controller.php?op=get");
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
        <td>${product.price}</td>
        <td><button class="btn btn-outline-primary">Alterar</button></td>
        <td><button class="btn btn-outline-primary" onclick="removeProduct(${
          product.productId
        })" id="btn-remove">Remover</button></td>
    </tr>`;
