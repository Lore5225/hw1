
const profileButton = document.querySelector("#profile__information__button");
const ordersButton = document.querySelector("#order__information__button");

const profileInformation = document.querySelector(".profile-info");
const ordersInformation = document.querySelector(".orders-info");

const informationButton = document.querySelectorAll(".order-details-button")

function toggleProfileInfo() {   
    profileInformation.classList.remove("hidden");
    ordersInformation.classList.add("hidden");
}

function toggleOrdersInfo() {   
    profileInformation.classList.add("hidden");
    ordersInformation.classList.remove("hidden");
}


function toggleInformationOrder(event)
{
    const button = event.target;
    const information = button.nextElementSibling;
    information.classList.toggle("order__text__open")
}


profileButton.addEventListener("click", toggleProfileInfo);
ordersButton.addEventListener("click", toggleOrdersInfo);

informationButton.forEach(button => {
    button.addEventListener("click", toggleInformationOrder);
});
