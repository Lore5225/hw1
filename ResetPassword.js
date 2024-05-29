const form = document.querySelector("#form-style");

function startAnimation() {
  const element = document.querySelector(".login-transition-left-to-right");
  element.classList.add("show-transition");
}

document.addEventListener("DOMContentLoaded", function () {
  startAnimation();
});

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
togglePswrd.addEventListener("click", togglePasswordVisibility);

document.getElementById("password").addEventListener("blur", passwordCheck);
document
  .getElementById("repeat_password")
  .addEventListener("blur", repeatPasswordCheck);

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
