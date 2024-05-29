function GetCart() {
  fetch("getCartProducts.php").then(onResponse).then(OnJson);
}

function onResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function OnJson(json) {
  console.log(json);
  const MainContainer = document.querySelector(".checkout__container");
  const ProductContainer = document.createElement("div");
  ProductContainer.classList.add("cart__items__container");
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

  MainContainer.appendChild(ProductContainer);
}

GetCart();
