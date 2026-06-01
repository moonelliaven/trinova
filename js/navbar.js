const menuBtn = document.querySelector(".menu-btn");
const navbarActive = document.querySelector(".navbar-active");

// menu toggle
menuBtn.addEventListener("click", () => {
    navbarActive.classList.toggle("active");
});