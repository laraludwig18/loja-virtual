$(document).ready(() => {
  $(".price").mask("#.##0,00", { reverse: true });
  const productId = window.location.search.slice(4);
  if (productId) {
    this.getProduct(productId);
  }
});

getProduct = async productId => {
  const response = await fetch(
    `controllers/product-controller.php?op=get&filtertype=id&filter=${productId}`
  );
  const { products } = await response.json();
  this.setValues(products[0]);
};

setValues = product => {
  const filename = this.getFilename(product.imageUrl);

  $("#name").val(product.name);
  $("#author").val(product.author);
  $("#description").val(product.description);
  $("#category").val(product.category);
  $("#quantity").val(product.quantity);
  $("#price").val(product.price);
  $("#label-file").text(filename);
};

getFilename = fileUrl => fileUrl.split("/")[3];

$("#form-product").submit(async e => {
  e.preventDefault();
  const product = this.buildProduct();

  if (!this.isValid(product)) return;

  const productExist = !!window.location.search;

  const data = new FormData();

  if (productExist) {
    data.append("productId", window.location.search.slice(4));
  }

  data.append("file", product.file);
  data.append("name", product.name);
  data.append("author", product.author);
  data.append("description", product.description);
  data.append("category", product.category);
  data.append("quantity", product.quantity);
  data.append("price", product.price);

  const requestInfo = {
    method: "POST",
    body: data
  };

  try {
    const url = productExist
      ? "controllers/product-controller.php?op=put"
      : "controllers/product-controller.php?op=post";

    const response = await fetch(url, requestInfo);

    const json = await response.json();

    if (json["code"] === 200) {
      window.location.replace("admin.php");
    }
  } catch (err) {
    console.log(err);
  }
});

buildProduct = () => ({
  file: $("#file").prop("files")[0],
  name: $("#name").val(),
  author: $("#author").val(),
  description: $("#description").val(),
  category: $("#category").val(),
  quantity: $("#quantity").val(),
  price: this.formatValue($("#price").cleanVal())
});

formatValue = value => {
  return value.length < 3
    ? value
    : `${value.slice(0, value.length - 2)}.${value.slice(
        value.length - 2,
        value.length
      )}`;
};

isValid = product => {
  let isValid = true;

  if (!window.location.search && !product.file) {
    $("#file").addClass("is-invalid");
    isValid = false;
  }
  if (product.quantity < 1) {
    $("#quantity").addClass("is-invalid");
    isValid = false;
  }
  if (product.price <= 0) {
    $("#price").addClass("is-invalid");
    isValid = false;
  }
  return isValid;
};

$("input").click(function() {
  $(this).removeClass("is-invalid");
});

$("#file").change(function(e) {
  const filename = $(this).prop("files")[0].name;
  $("#label-file").text(filename);
});
