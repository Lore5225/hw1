const form = document.getElementById("checkoutForm");
const inputs = document.querySelectorAll("input[type='text']:not(#notes)");

inputs.forEach(function (input) {
  input.addEventListener("blur", function () {
    const error = input.nextElementSibling;
    if (input.value.trim() === "") {
      showError(input, error, "Campo obbligatorio");
    } else {
      hideError(input, error);
    }
  });
});

form.addEventListener("submit", function (event) {
  let hasVisibleErrors = false;

  inputs.forEach(function (input) {
    const error = input.nextElementSibling;
    if (input.value.trim() === "" && input.id !== "notes") {
      showError(input, error, "Campo obbligatorio");
      hasVisibleErrors = true;
    } else {
      hideError(input, error);
    }
  });

  if (hasVisibleErrors) {
    event.preventDefault();
  }
});

function showError(input, error, message) {
  input.classList.add("error");
  error.textContent = message;
}

function hideError(input, error) {
  input.classList.remove("error");
  error.textContent = "";
}

GetCart();

function GetCart() {
  fetch("getCartProducts.php").then(onResponse).then(OnJson);
}

function onResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function OnJson(json) {
  const ProductContainer = document.querySelector(".cart__items__container");
  for (product of json) {
    const ProductItem = document.createElement("div");
    ProductItem.classList.add("cart__item");

    const NameWrapper = document.createElement("div");
    NameWrapper.classList.add("txtContainer");
    const Name = document.createElement("p");
    Name.textContent = product.nome;
    NameWrapper.appendChild(Name);

    const Image = document.createElement("img");
    Image.src = product.immagine;

    const Quantity = document.createElement("p");
    Quantity.textContent = "Quantità: " + product.Quantità;
    const QuantityContainer = document.createElement("div");
    QuantityContainer.classList.add("txtContainer");
    QuantityContainer.appendChild(Quantity);

    const Total = document.createElement("p");
    Total.textContent = "Prezzo: €" + product.Totale;
    const przTotContainer = document.createElement("div");
    przTotContainer.classList.add("txtContainer");
    przTotContainer.appendChild(Total);

    ProductItem.appendChild(NameWrapper);
    ProductItem.appendChild(Image);
    ProductItem.appendChild(QuantityContainer);
    ProductItem.appendChild(przTotContainer);

    ProductContainer.appendChild(ProductItem);
  }
}
