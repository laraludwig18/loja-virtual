$("#form-contato").submit(async e => {
  e.preventDefault();

  const contact = this.buildContact();

  if (!isValid(contact)) return;

  const requestInfo = {
    method: "POST",
    body: JSON.stringify({
      ...contact
    }),
    headers: {
      "Content-Type": "application/json"
    }
  };
  try {
    const response = await fetch(
      "controllers/contact-controller.php",
      requestInfo
    );
    const json = await response.json();

    if (json["code"] === 200) {
      window.location.replace("home.php");
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

buildContact = () => ({
  name: $("#name").val(),
  email: $("#email").val(),
  mensagem: $("#mensagem").val()
});

isValid = contact => {
  let isValid = true;
  if (!contact.name.match(/^[A-zÁ-úã-õç ]{2,70}$/)) {
    $("#name").addClass("is-invalid");
    isValid = false;
  }
  if (
    !contact.email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[.a-zA-Z0-9]{2,}$/)
  ) {
    $("#email").addClass("is-invalid");
    isValid = false;
  }
  return isValid;
};

$("input").click(function() {
  $(this).removeClass("is-invalid");
  $("#alert").addClass("d-none");
});
