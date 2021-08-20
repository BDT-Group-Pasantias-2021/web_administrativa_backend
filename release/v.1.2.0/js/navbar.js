let icon = document.getElementById("icon");
let icon1 = document.getElementById("a");
let icon2 = document.getElementById("b");
let icon3 = document.getElementById("c");
let nav = document.getElementById("nav");
let blue = document.getElementById("blue");

icon.addEventListener("click", () => {
	icon1.classList.toggle("a");
	icon2.classList.toggle("c");
	icon3.classList.toggle("b");
	nav.classList.toggle("show");
	blue.classList.toggle("slide");
});
