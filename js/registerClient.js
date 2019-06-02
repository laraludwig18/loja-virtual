$("#form-client").submit(function(e) {
  e.preventDefault();

  const client = buildClient();

  if (!isValid(client)) return;

  const url = "controllers/client-controller.php";
  $.ajax({
    type: "post",
    url,
    data: {
      ...client
    }
  }).done(function(data) {
    console.log("sucesso");
  });
});

buildClient = () => ({
  name: $("#name").val(),
  email: $("#email").val(),
  phoneNumber: $("#phoneNumber").val(),
  cpf: $("#cpf").val(),
  address: $("#address").val(),
  birthDate: $("#birthDate").val(),
  password: $("#password").val(),
  confirmPassword: $("#confirmPassword").val()
});

isValid = client => {
  if (!client.name.match(/\w/)) {
    alert("Nome inválido");
    return false;
  }
  if (
    !client.email.match(
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
    )
  ) {
    alert("Email inválido");
    return false;
  }
  if (client.cpf.length !== 11) {
    alert("CPF inválido");
    return false;
  }
  if (client.password !== client.confirmPassword) {
    alert("Senhas não coincidem");
    return false;
  }
  return true;
};
