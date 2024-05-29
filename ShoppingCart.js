function GetCart() {
  fetch("getCartProducts.php").then(onResponse).then(OnJson);
}

function onResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function OnJson(json) {
  console.log(json);
  const MainContainer = document.querySelector(".products__wrap");
  MainContainer.innerHTML = "";
  let totalPrice = 0;
  console.log(json.length);
  if (json.length == 0) {
    const error = document.createElement("h1");
    error.textContent = "Nessun prodotto nel carrello!";
    MainContainer.appendChild(error);
  } else {
    for (let product of json) {
      let idProduct = product.id;
      const productItem = document.createElement("div");
      productItem.classList.add("product__container");

      const imgWrapper = document.createElement("div");
      imgWrapper.classList.add("img__product__wrapper");
      const productImg = document.createElement("img");
      productImg.src = product.immagine;
      productImg.classList.add("product__img");
      imgWrapper.appendChild(productImg);

      const nome = document.createElement("div");
      nome.textContent = product.nome;
      nome.classList.add("product__text");

      console.log(product.Totale);
      const przTotContainer = document.createElement("div");
      przTotContainer.classList.add("product__tot__container");
      const przTot = document.createElement("div");
      przTot.textContent = "Prezzo: €" + product.Totale;
      przTot.classList.add("product__total");
      przTotContainer.appendChild(przTot);

      const quantità = document.createElement("div");
      const quantità_container = document.createElement("div");
      quantità_container.classList.add("quantity__container");
      const plus_image = document.createElement("img");
      const minus_image = document.createElement("img");
      minus_image.src = "images/minusiconCart.ico";
      plus_image.src = "images/plusIconCart.ico";
      plus_image.classList.add("button__add");

      plus_image.addEventListener("click", function () {
        addButton(idProduct);
      });

      minus_image.addEventListener("click", function () {
        removeButton(idProduct);
      });

      minus_image.classList.add("button__remove");
      quantità.classList.add("product__quantity");
      quantità.textContent = product.Quantità;
      quantità_container.appendChild(minus_image);
      quantità_container.appendChild(quantità);
      quantità_container.appendChild(plus_image);

      productItem.appendChild(nome);
      productItem.appendChild(imgWrapper);
      productItem.appendChild(quantità_container);
      productItem.appendChild(przTotContainer);
      MainContainer.appendChild(productItem);

      totalPrice += Number(product.Totale);
    }

    let totalContainer = document.querySelector(".cart__bottom");
    if (!totalContainer) {
      totalContainer = document.createElement("div");
      totalContainer.classList.add("cart__bottom");
      MainContainer.appendChild(totalContainer);
    }

    const button_wrapper = document.createElement("a");
    button_wrapper.classList.add("link__checkout");
    const totText = document.createElement("p");
    const button_checkout = document.createElement("button");
    totText.textContent = "Totale: €" + totalPrice;
    const arrow_icon = document.createElement("img");
    button_wrapper.href = "CheckoutPage.php";
    arrow_icon.src = "images/right-arrow-svgrepo-com.svg";
    button_checkout.classList.add("button__checkout");
    button_checkout.textContent = "Vai al checkout";
    button_checkout.appendChild(arrow_icon);

    button_wrapper.appendChild(button_checkout);
    totalContainer.appendChild(totText);
    totalContainer.appendChild(button_wrapper);

    MainContainer.appendChild(totalContainer);
  }
}

function addButton(idProduct) {
  const Data = new FormData();
  Data.append("id", idProduct);
  fetch("addtocart.php", { method: "post", body: Data }).then(OnAdded);
}

function removeButton(idProduct) {
  const Data = new FormData();
  Data.append("id", idProduct);
  fetch("RemoveItemCart.php", { method: "post", body: Data }).then(OnAdded);
}

function OnAdded(response) {
  console.log(response.json);
  if (!response.ok) return null;
  GetCart();
}

GetCart();
