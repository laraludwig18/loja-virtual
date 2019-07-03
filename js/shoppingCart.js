$(document).ready(() => {
  this.getProducts();
});

handleChangeQuantity = async productId => {
  const shoppingCartList = this.getShoppingCartList();

  const product = shoppingCartList.filter(item => productId == item.productId);

  const quantity = $(`#quantity${productId}`).val();

  if (quantity < 1) {
    $(`#quantity${productId}`).val(product[0].quantity);
    return alert("Quantidade inválida");
  }
  try {
    const response = await fetch(
      `controllers/product-controller.php?op=get&filtertype=id&filter=${productId}`
    );

    const { products } = await response.json();

    if (Number(products[0].quantity) < quantity) {
      $(`#quantity${productId}`).val(product[0].quantity);
      return alert("Quantidade maior que o estoque");
    }
  } catch (err) {
    console.log(err);
  }

  const products = shoppingCartList.map(product => {
    return productId == product.productId ? { ...product, quantity } : product;
  });

  console.log(products);

  this.setShoppingCartList(products);
  this.renderShoppingCart(products);
  this.calculateTotal(products);
};

clearStorage = () => {
  const clientId = localStorage.getItem("@id");
  localStorage.removeItem(`shoppingCartList${clientId}`);
};

getShoppingCartList = () => {
  const clientId = localStorage.getItem("@id");
  return JSON.parse(localStorage.getItem(`shoppingCartList${clientId}`)) || [];
};

setShoppingCartList = shoppingCartList => {
  const clientId = localStorage.getItem("@id");
  localStorage.setItem(
    `shoppingCartList${clientId}`,
    JSON.stringify(shoppingCartList)
  );
};

buildShoppingCartList = (products, shoppingCartList) =>
  products.map(product => {
    const cartItem = shoppingCartList.filter(
      item => item.productId == product.productId
    );
    return { ...product, quantity: cartItem[0].quantity };
  });

renderShoppingCart = products => {
  $("#table > tbody > tr").remove();
  const shoppingCartView = products.map(product => this.render(product));
  $("#table > tbody").append(shoppingCartView);
};

finalizePurchase = async total => {
  const shoppingCartList = this.getShoppingCartList();

  const requestInfo = {
    method: "POST",
    body: JSON.stringify({
      shoppingCartList,
      total
    })
  };

  try {
    const response = await fetch(
      "controllers/payment-receipt-controller.php",
      requestInfo
    );
    const json = await response.json();

    if (json["code"] === 200) {
      alert("Compra realizada com sucesso!");
      this.clearStorage();
      window.location.replace("home.php");
    }
  } catch (err) {
    console.log(err);
  }
};

renderTotal = total =>
  `<div class="d-flex justify-content-end align-items-center">
    <p class="totalText">Total:</p>
    <p class="valueText">R$ ${total.toFixed(2)}</p>
    <button class="btn btn-primary btn-buy" onclick="finalizePurchase(${total})">FINALIZAR COMPRA</button>
    </div>
  `;

calculateTotal = products => {
  $("#total > div").remove();
  if (!products.length) return;
  const total = products.reduce(
    (total, product) => total + product.price * product.quantity,
    0
  );
  const totalView = this.renderTotal(total);
  $("#total").append(totalView);
};

getProducts = async () => {
  const shoppingCartList = this.getShoppingCartList();
  if (!shoppingCartList.length) return;
  const arrayIds = shoppingCartList.map(item => item.productId);

  try {
    const response = await fetch(
      `controllers/product-controller.php?op=get&filtertype=ids&filter=${JSON.stringify(
        arrayIds
      )}`
    );

    const { products } = await response.json();
    const newProducts = this.buildShoppingCartList(products, shoppingCartList);

    this.setShoppingCartList(newProducts);
    this.renderShoppingCart(newProducts);
    this.calculateTotal(newProducts);
  } catch (err) {
    console.log(err);
  }
};

removeProductFromCart = productId => {
  const shoppingCartList = this.getShoppingCartList();
  const products = shoppingCartList.filter(item => productId != item.productId);
  this.setShoppingCartList(products);
  this.renderShoppingCart(products);
  this.calculateTotal(products);
};

render = product => {
  const { productId, name, quantity, price, imageUrl } = product;
  return `<tr>
        <td><img class="product-img" src="${imageUrl}" alt="${name}"></td>
        <td>${name}</td>
        <td><input type="text" class="form-control input-quantity" id="quantity${productId}" onblur="handleChangeQuantity(${productId})" value="${
    product.quantity
  }" required></td>
        <td>R$ ${price}</td>
        <td>R$ ${(price * quantity).toFixed(2)}</td>
        <td><button class="btn btn-outline-primary" onclick="removeProductFromCart(${productId})" id="btn-remove">Remover</button></td>
    </tr>`;
};
