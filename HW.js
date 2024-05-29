const documentBody = document.querySelector("body");

///////////////////////////////

const observerLeftToRight = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show_transition_LeftToRight");
    }
  });
});
const hiddenLeftRigth = document.querySelectorAll(
  ".hidden_transition_LeftToRight"
);
hiddenLeftRigth.forEach((hidden) => observerLeftToRight.observe(hidden));

const observerFadeIn = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show_transition_FadeIn");
    }
  });
});
const hiddenFadeIn = document.querySelectorAll(".hidden_transition_FadeIn");
hiddenFadeIn.forEach((hidden) => observerFadeIn.observe(hidden));

/////////////////////////////////////////////////////
const problems = document.querySelectorAll(".row__problem h3");
function probTendina(event) {
  const container = event.currentTarget.parentNode;
  const solution = container.querySelector(".solution-text");
  solution.classList.toggle("solution-open");
  const probh3 = container.querySelector("h3");
  probh3.classList.toggle("bg-blue");
}

for (const problem of problems) {
  problem.addEventListener("click", probTendina);
}
/////////////////////////////////////////////////////
const carrello = document.querySelector("#shopping-cart");
function shopping() {
  const containerShop = document.querySelector(".flex-shopping");
  containerShop.classList.remove("hidden");
}
carrello.addEventListener("click", shopping);
/////////////////////////////////////////////////////

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

/////////////////////////////////////////////////////

function youtubeVideos() {
  fetch("youtubeAPIRequest.php").then(onYoutubeSuccess).then(OnJsonYoutube);
}

function onYoutubeSuccess(response) {
  if (!response.ok) return null;
  return response.json();
}

function OnJsonYoutube(json) {
  console.log(json);
  const cellVideo = document.querySelector(".video__container");
  let num_results = json.contents.length;
  console.log(json.contents.length);
  if (num_results > 3) num_results = 3;
  console.log(num_results);

  for (let i = 0; i < num_results; i++) {
    const video_data = json.contents[i].video;
    const title = video_data.title;
    const thumbnail = video_data.movingThumbnails[0].url;
    const video_container = document.createElement("div");
    video_container.classList.add("video-container");
    const title_container = document.createElement("div");
    title_container.textContent = title;
    title_container.classList.add("video-title");
    const video_url = document.createElement("a");
    video_url.href = "https://www.youtube.com/watch?v=" + video_data.videoId;
    video_url.target = "_blank";
    console.log(video_url);
    const thumbnail_img = document.createElement("img");
    thumbnail_img.classList.add("thumbnail-img");
    thumbnail_img.src = thumbnail;
    video_url.appendChild(thumbnail_img);
    video_container.appendChild(title_container);
    video_container.appendChild(video_url);
    cellVideo.appendChild(video_container);
  }
}

youtubeVideos();
