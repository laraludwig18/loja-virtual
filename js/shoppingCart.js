$(document).ready(() => {
  this.getShoppingCart();
});

getShoppingCart = async () => {
  try {
    const response = await fetch(
      `controllers/shopping-cart-controller.php?op=get`
    );
    const { shoppingCart } = await response.json();
    const shoppingCartView = shoppingCart.map(product => render(product));
    $("#table > tbody").append(shoppingCartView);
  } catch (err) {
    console.log(err);
  }
};

render = product =>
  `<tr>
        <td><img class="product-img" src="${product.imageUrl}" alt="${
    product.name
  }"></td>
        <td>${product.name}</td>
        <td><input type="email" class="form-control input-quantity" id="quantity" value="${
          product.quantity
        }"></td>
        <td>R$ ${product.price}</td>
        <td>R$ ${product.price * product.quantity}</td>
        <td><button class="btn btn-outline-primary" onclick="removeProduct(${
          product.productId
        })" id="btn-remove">Remover</button></td>
    </tr>`;
