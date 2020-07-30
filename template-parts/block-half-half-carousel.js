var mySwiper = new Swiper('.swiper-container', {
  loop: false,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  autoplay: {
    // 7 seconds per slide
    delay: 7000,
    stopOnLastSlide: true,
  },
});
