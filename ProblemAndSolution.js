const hamburgerIcon = document.getElementById("hamburger__icon");
const nav = document.querySelector("nav");

hamburgerIcon.addEventListener("click", () => {
  nav.classList.toggle("open");
});

const tendine = document.querySelectorAll("nav h1");

function menuTendina(event) {
  const container = event.currentTarget;
  const text = container.nextElementSibling;

  if (window.innerWidth <= 768) {
    text.classList.toggle("nav-text-open");
  } else {
    document.querySelectorAll(".nav-text").forEach((navText) => {
      if (navText !== text) {
        navText.classList.remove("nav-text-open");
      }
    });
    text.classList.add("nav-text-open");
  }
}

for (const tendina of tendine) {
  if (window.innerWidth > 768) {
    tendina.addEventListener("mouseover", menuTendina);
  } else {
    tendina.addEventListener("click", menuTendina);
  }
}

document.querySelector("nav").addEventListener("mouseleave", function () {
  document.querySelectorAll(".nav-text").forEach((navText) => {
    navText.classList.remove("nav-text-open");
  });
});

function getSolution() {
  const solutionID = document.querySelector(".solution__container");
  fetch("getsolution.php?q=" + solutionID.dataset.id)
    .then(OnResponse)
    .then(OnJson);
}

function OnResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function OnJson(json) {
  const immagini = json.immagini;
  const paragrafi = json.paragrafi;
  const titoli = json.titoli;
  const mainContainer = document.querySelector(".solution__container");
  const mainParagraphContainer = document.querySelector(".main__paragraph");
  if (json.error === "Nessun risultato trovato") {
    mainParagraphContainer.textContent = "Nessun risultato trovato.";
    return null;
  }
  const paragraphContainer = document.createElement("div");
  paragraphContainer.classList.add("Paragraph");
  const mainTitle = document.createElement("h1");
  const mainParagraph = document.createElement("p");
  mainTitle.textContent = titoli[0];
  mainParagraph.textContent = paragrafi[0];
  paragraphContainer.appendChild(mainTitle);
  paragraphContainer.appendChild(mainParagraph);

  const mainImageWrapper = document.createElement("div");
  mainImageWrapper.classList.add("image__wrapper");
  const MainImage = document.createElement("img");
  MainImage.src = immagini[0];
  mainImageWrapper.appendChild(MainImage);

  mainParagraphContainer.appendChild(paragraphContainer);
  mainParagraphContainer.appendChild(mainImageWrapper);

  mainContainer.appendChild(mainParagraphContainer);

  const productsContainer = document.createElement("div");
  productsContainer.classList.add("products__solution__container");

  for (let i = 1; i < json.paragrafi.length; i++) {
    const gridItem = document.createElement("div");
    gridItem.classList.add("products__item");

    const img = document.createElement("img");
    img.src = immagini[i];
    const title = document.createElement("h1");
    title.textContent = titoli[i];
    const paragraph = document.createElement("p");
    paragraph.textContent = paragrafi[i];

    gridItem.appendChild(img);
    gridItem.appendChild(title);
    gridItem.appendChild(paragraph);

    productsContainer.appendChild(gridItem);
  }

  mainContainer.appendChild(productsContainer);
}

getSolution();
