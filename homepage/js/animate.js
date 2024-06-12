loadingAnimation();

function loadingAnimation() {
  gsap.from(".hero section", {
    y: -600,
    opacity: 0,
    delay: 0.2,
    duration: 1,
    stagger: 0.2,
  });
  gsap.from(".aa", {
    opacity: 0,
    height: 0,
    duration: 0.4,
  });
}
