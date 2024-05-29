const form = document.querySelector("#form-style");

function startAnimation() {
  const element = document.querySelector(".login-transition-left-to-right");
  element.classList.add("show-transition");
}

document.addEventListener("DOMContentLoaded", function () {
  startAnimation();
});

function usernameCheck(event) {
  const textBox = event.currentTarget;
  const inputValue = textBox.value.trim();
  const errorUsername = document.querySelector("#username-error");
  const regex = /^[a-zA-Z0-9_]{1,16}$/;

  if (inputValue.length === 0) {
    errorUsername.textContent = "Inserisci username";
  } else if (!regex.test(inputValue)) {
    errorUsername.textContent =
      "Errore! L'username deve contenere solo lettere, numeri e _, con un massimo di 16 caratteri";
  } else {
    errorUsername.textContent = "";
  }

  if (inputValue.length !== 0 && regex.test(inputValue)) {
    fetch("usernamecheck.php?q=" + encodeURIComponent(inputValue))
      .then(onResponse)
      .then(CheckUsernameDB);
  }
}

function onResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function CheckUsernameDB(json) {
  const errorUsername = document.querySelector("#username-error");

  if (json) {
    errorUsername.textContent = "Un utente con quell'username è già presente.";
  } else {
    errorUsername.textContent = "";
  }
}

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

function CheckEmailDB(json) {
  const errorEmail = document.querySelector("#email-error");

  if (json) {
    errorEmail.textContent = "Un utente con questa email è già presente.";
  } else {
    errorEmail.textContent = "";
  }
}

function passwordCheck(event) {
  const textBox = event.currentTarget;
  const inputValue = textBox.value;
  const errorPassword = document.querySelector("#password-error");
  const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;

  if (inputValue.length === 0) {
    errorPassword.textContent = "Inserisci password.";
  } else if (!regex.test(inputValue)) {
    errorPassword.textContent =
      "La password deve contenere almeno 8 caratteri, di cui almeno una maiuscola, una minuscola, un numero e un simbolo tra !@#$%^&*";
  } else {
    errorPassword.textContent = "";
  }
}

function repeatPasswordCheck(event) {
  const textBox = event.currentTarget;
  const errorPasswordRepeat = document.querySelector("#repeat_password-error");
  const password = form.password.value;

  if (textBox.value !== password) {
    errorPasswordRepeat.textContent = "Le due password non corrispondono.";
  } else {
    errorPasswordRepeat.textContent = "";
  }
}

const togglePswrd = document.querySelector("#toggle-pswrd");
function togglePasswordVisibility() {
  const input = document.querySelector("#password");
  if (input.type === "password") {
    input.type = "text";
  } else {
    input.type = "password";
  }
}

function termsCheck() {
  const checkbox = document.querySelector("#terms-checkbox");
  const errorTerms = document.querySelector("#terms-error");

  if (!checkbox.checked) {
    errorTerms.textContent = "Devi accettare le condizioni per procedere.";
  } else {
    errorTerms.textContent = "";
  }
}

togglePswrd.addEventListener("click", togglePasswordVisibility);

document.getElementById("username").addEventListener("blur", usernameCheck);
document.getElementById("email").addEventListener("blur", emailCheck);
document.getElementById("password").addEventListener("blur", passwordCheck);
document
  .getElementById("repeat_password")
  .addEventListener("blur", repeatPasswordCheck);
document
  .getElementById("terms-checkbox")
  .addEventListener("change", termsCheck);

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
