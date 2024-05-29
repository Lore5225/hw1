function GetProduct() {
  const productName = document.querySelector(".Products__Container");
  fetch("DescriptionPageGet.php?q=" + productName.dataset.nome)
    .then(responseProducts)
    .then(onJSONProducts);
}

function responseProducts(response) {
  if (!response.ok) return null;
  return response.json();
}

function onJSONProducts(json) {
  console.log(json);

  const Titoli = json.titoli;
  const Paragrafi = json.paragrafi;
  const Immagini = json.immagini;
  const contentContainer = document.querySelector(".Products__Container");

  if (json.error === "Nessun risultato trovato.") {
    const error = document.createElement("h1");
    error.textContent = "Nessun risultato trovato.";
    contentContainer.appendChild(error);
    return null;
  }

  const TitoloPrincipale = document.createElement("h1");
  TitoloPrincipale.textContent = Titoli[0];
  const InformazioniPrincipali = document.createElement("p");
  InformazioniPrincipali.textContent = Paragrafi[0];
  InformazioniPrincipali.classList.add("main__information__style");

  const ImgPrincipale = document.createElement("img");
  ImgPrincipale.src = Immagini[0];

  contentContainer.appendChild(ImgPrincipale);
  contentContainer.appendChild(TitoloPrincipale);
  contentContainer.appendChild(InformazioniPrincipali);
  const ParagraphContainer = document.createElement("div");
  ParagraphContainer.classList.add("Paragraph__container");
  for (let i = 1; i < Paragrafi.length; i++) {
    const Paragraph = document.createElement("div");
    Paragraph.classList.add("paragraph");
    const img = document.createElement("img");
    img.src = Immagini[i];
    const Title = document.createElement("h1");
    Title.textContent = Titoli[i];
    const Description = document.createElement("p");
    Description.textContent = Paragrafi[i];
    const pContainer = document.createElement("div");
    pContainer.classList.add("p__container");
    pContainer.appendChild(Description);

    Paragraph.appendChild(Title);
    Paragraph.appendChild(img);
    Paragraph.appendChild(pContainer);

    ParagraphContainer.appendChild(Paragraph);
    contentContainer.appendChild(ParagraphContainer);
  }
}

GetProduct();

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

const hamburgerIcon = document.getElementById("hamburger__icon");
const nav = document.querySelector("nav");

hamburgerIcon.addEventListener("click", () => {
  nav.classList.toggle("open");
});
