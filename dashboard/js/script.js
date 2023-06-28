//sidebar
var sidebar = document.querySelector(".top-bar-left"),
  navbar = document.querySelector("nav");
sidebar.addEventListener("click", function () {
  navbar.classList.toggle("minimize");
});

//topbar
var topbar = document.querySelector(".top-bar-right"),
  utils = document.querySelector(".utils");

topbar.addEventListener("click", function () {
  utils.classList.toggle("open");
});

//remove drop menu on clicking on window
document.addEventListener("mouseup", function (e) {
  if (!utils.contains(e.target) && !topbar.contains(e.target)) {
    utils.classList.remove("open");
  }
});
