var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 1,
  freeMode: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    410: {
      slidesPerView: 1,
    },
    880: {
      slidesPerView: 2,
    },
    1340: {
      slidesPerView: 3,
    },
    1900: {
      slidesPerView: 4,
    },
  },
});
