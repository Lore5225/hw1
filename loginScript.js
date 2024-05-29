const form = document.querySelector("#form-style");

function startAnimation() {
  const element = document.querySelector(".login-transition-left-to-right");
  element.classList.add("show-transition");
}

document.addEventListener("DOMContentLoaded", function () {
  startAnimation();
});

function submitCheck(event) {
  const blankError = document.querySelector(".error-style");

  if (form.username.value.length === 0 || form.password.value.length === 0) {
    blankError.textContent = "Tutti i campi sono obbligatori!";
    blankError.classList.remove("hidden");
    event.preventDefault();
  } else {
    blankError.classList.add("hidden");
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
form.addEventListener("submit", submitCheck);
