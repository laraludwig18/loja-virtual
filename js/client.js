$(document).ready(() => {
  $("#birthDate")[0].max = new Date().toISOString().slice(0, 10);
});

$("#form-client").submit(async e => {
  e.preventDefault();

  const client = this.buildClient();

  if (!isValid(client)) return;

  const requestInfo = {
    method: "POST",
    body: JSON.stringify({
      ...client
    }),
    headers: {
      "Content-Type": "application/json"
    }
  };
  try {
    const response = await fetch(
      "controllers/client-controller.php",
      requestInfo
    );
    const json = await response.json();
    if (json["code"] === 200) {
      window.location.replace("login.php");
    } else {
      $(window).scrollTop(0);
      $("#alert")
        .removeClass("d-none")
        .text(json["errorMessage"]);
    }
  } catch (err) {
    console.log(err);
  }
});

buildClient = () => ({
  name: $("#name").val(),
  email: $("#email").val(),
  phoneNumber: $("#phoneNumber").cleanVal(),
  cpf: $("#cpf").cleanVal(),
  address: $("#address").val(),
  birthDate: $("#birthDate").val(),
  password: $("#password").val(),
  confirmPassword: $("#confirmPassword").val()
});

isValid = client => {
  let isValid = true;
  if (!client.name.match(/^[A-zÁ-úã-õç ]{2,70}$/)) {
    $("#name").addClass("is-invalid");
    isValid = false;
  }
  if (
    !client.email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[.a-zA-Z0-9]{2,70}$/)
  ) {
    $("#email").addClass("is-invalid");
    isValid = false;
  }
  if (client.phoneNumber.length !== 11) {
    $("#phoneNumber").addClass("is-invalid");
    isValid = false;
  }
  if (client.cpf.length !== 11) {
    $("#cpf").addClass("is-invalid");
    isValid = false;
  }
  if (client.password.length < 6) {
    $("#password").addClass("is-invalid");
    isValid = false;
  }
  if (client.password !== client.confirmPassword) {
    $("#confirmPassword").addClass("is-invalid");
    isValid = false;
  }
  return isValid;
};

$("input").click(function() {
  $(this).removeClass("is-invalid");
  $("#alert").addClass("d-none");
});
