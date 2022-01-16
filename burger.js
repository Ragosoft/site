let burger = document.querySelector(".burger");
let navMenu = document.querySelector(".nav__menu");

burger.addEventListener("click", mobileMenu);

function mobileMenu() {
	burger.classList.toggle("active");
	navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav__link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu(){
	burger.classList.remove("active");
	navMenu.classList.remove("active");
}