window.addEventListener("scroll", function () {
  var nav = document.querySelector(".nav");

  if (window.scrollY > 300) {
    nav.classList.add("sticky");
  } else if (window.scrollY <= 300) {
    nav.classList.remove("sticky");
  }
});
