function startAnimation() {
  const element = document.querySelector(".login-transition-left-to-right");
  element.classList.add("show-transition");
}

document.addEventListener("DOMContentLoaded", function () {
  startAnimation();
});

const form = document.querySelector("#form-style");

function emailCheck(event) {
  const textBox = event.currentTarget;
  const inputValue = textBox.value.trim();
  const errorEmail = document.querySelector("#email-error");
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (inputValue.length === 0) {
    errorEmail.textContent = "Inserisci email";
  } else if (!regex.test(inputValue)) {
    errorEmail.textContent = "Errore! Formato email non valido.";
  } else {
    errorEmail.textContent = "";
  }

  if (inputValue.length !== 0 && regex.test(inputValue)) {
    fetch("emailcheck.php?q=" + encodeURIComponent(inputValue))
      .then(onResponse)
      .then(CheckEmailDB);
  }
}

function onResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function CheckEmailDB(json) {
  const errorEmail = document.querySelector("#email-error");

  if (!json) {
    errorEmail.textContent = "Non esiste nessun utente con questa Email.";
  } else {
    errorEmail.textContent = "";
  }
}

function submitCheck(event) {
  const errors = document.querySelectorAll(".error-style");
  let hasError = false;

  errors.forEach(function (error) {
    if (error.textContent.trim() !== "") {
      hasError = true;
    }
  });

  if (hasError) {
    event.preventDefault();
  }
}

form.addEventListener("submit", submitCheck);

document.getElementById("email").addEventListener("blur", emailCheck);
