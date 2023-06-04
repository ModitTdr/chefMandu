var swiper = new Swiper(".mySwiper", {
  slidesPerView: 4,
  spaceBetween: 1,
  freeMode: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    410: {
      slidesPerView: 2,
    },
    620: {
      slidesPerView: 3,
    },
    850: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
    1900: {
      slidesPerView: 6,
    },
  },
});
