$(document).ready(() => {
  $(".price").mask("#.##0,00", { reverse: true });
});

$("#form-product").submit(async e => {
  e.preventDefault();
  const product = this.buildProduct();

  const data = new FormData();

  data.append("file", product.file);
  data.append("name", product.name);
  data.append("description", product.description);
  data.append("category", product.category);
  data.append("quantity", product.quantity);
  data.append("price", product.price);

  const requestInfo = {
    method: "POST",
    body: data
  };
  try {
    const response = await fetch(
      "controllers/product-controller.php",
      requestInfo
    );
    const json = await response.json();
    console.log(json["product"]);
  } catch (err) {
    console.log(err);
  }
});

buildProduct = () => ({
  file: $("#file").prop("files")[0],
  name: $("#name").val(),
  description: $("#description").val(),
  category: "teste",
  quantity: $("#quantity").val(),
  price: $("#price").val()
});
