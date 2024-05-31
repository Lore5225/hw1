function CaricaProdotti() {
  fetch("get_products.php")
    .then((response) => response.json())
    .then(onJSONProducts);
}

CaricaProdotti();

function onJSONProducts(products) {
  const gridProducts = document.querySelector(".grid__products__container");
  products.forEach((product) => {
    const productItem = document.createElement("div");
    productItem.classList.add("grid__item");

    const imgContainer = document.createElement("div");
    imgContainer.classList.add("img__product__wrapper");

    const productImg = document.createElement("img");
    productImg.src = product.immagine;
    productImg.classList.add("img__product");

    imgContainer.appendChild(productImg);

    const addButton = document.createElement("button");
    addButton.classList.add("button__add__to__cart");
    addButton.textContent = "Aggiungi al carrello";

    productItem.appendChild(imgContainer);
    productItem.appendChild(addButton);

    addButton.addEventListener("click", (event) => {
      event.stopPropagation();
      const formData = new FormData();
      formData.append("id", product.id);
      fetch("addtocart.php", { method: "post", body: formData })
        .then(onResponse)
        .then(onJsonCart);
    });

    productItem.addEventListener("click", () => {
      showProductModal(product);
    });

    gridProducts.appendChild(productItem);
  });
}

function showProductModal(product) {
  const modalContainer = document.querySelector(".modal__container");
  modalContainer.classList.add("active");

  const modalProduct = document.createElement("div");
  modalProduct.classList.add("modal__product");

  const closeButton = document.createElement("img");
  closeButton.src = "images/close.png";
  closeButton.classList.add("cross__img");
  closeButton.addEventListener("click", () => {
    modalContainer.classList.remove("active");
  });

  const productName = document.createElement("h1");
  productName.textContent = product.nome;

  const productImage = document.createElement("img");
  productImage.src = product.immagine;
  productImage.classList.add("modal__product__img");

  const productDescription = document.createElement("div");
  productDescription.classList.add("product__description");
  productDescription.textContent = product.descrizione;

  const productPrice = document.createElement("div");
  productPrice.classList.add("price__modal");
  productPrice.textContent = "Prezzo: €" + product.prezzo;

  const formSubmit = document.createElement("form");
  formSubmit.action = "DescriptionProducts.php";
  formSubmit.method = "post";

  const learnMoreButton = document.createElement("button");
  learnMoreButton.classList.add("learn__more__button");
  if (product.nome.includes("Thermo")) {
    learnMoreButton.value = "ThermoVital";
  } else {
    learnMoreButton.value = product.nome;
  }
  learnMoreButton.name = "product";
  learnMoreButton.textContent = "Ulteriori Informazioni";
  formSubmit.appendChild(learnMoreButton);

  modalProduct.appendChild(closeButton);
  modalProduct.appendChild(productName);
  modalProduct.appendChild(productImage);
  modalProduct.appendChild(productDescription);
  modalProduct.appendChild(productPrice);
  modalProduct.appendChild(formSubmit);

  modalContainer.innerHTML = "";
  modalContainer.appendChild(modalProduct);
}

let messageContainer;

function onResponse(response) {
  if (!response.ok) {
    return null;
  } else return response.json();
}

function onJsonCart(json) {
  if (!messageContainer) {
    messageContainer = document.createElement("div");
    messageContainer.classList.add("cart__message__added__container");
    document.body.appendChild(messageContainer);
  } else return null;

  if (!document.querySelector(".cart__message__added")) {
    const cartAddedMessage = document.createElement("div");
    if (json.success) cartAddedMessage.textContent = "Aggiunto al carrello!";
    else cartAddedMessage.textContent = json.error;
    cartAddedMessage.classList.add("cart__message__added");
    messageContainer.appendChild(cartAddedMessage);

    setTimeout(() => {
      messageContainer.removeChild(cartAddedMessage);
      if (messageContainer.childElementCount === 0) {
        document.body.removeChild(messageContainer);
        messageContainer = null;
      }
    }, 3000);
  }
}
