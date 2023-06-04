window.addEventListener("scroll", function () {
  var nav = document.querySelector(".nav");

  if (window.scrollY > 630) {
    nav.classList.add("sticky");
  } else if (window.scrollY < 600) {
    nav.classList.remove("sticky");
  }
});

var toggle = 1;
var activeBar = document.querySelector(".checkBtn");
var menus = document.querySelector(".menus");

activeBar.addEventListener("click", function () {
  if (toggle == 1) {
    menus.style.display = "block";
    toggle = 0;
  } else {
    menus.style.display = "none";
    toggle = 1;
  }
});
