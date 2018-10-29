var mySwiper = new Swiper ('.swiper-container', {
  direction: 'horizontal',
  loop: true,
  slidesPerView: 'auto',
  centeredSlides: true,
  spaceBetween: 60,
  autoHeight: true,
  preloadImages: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

})

// mySwiper.on('resize', function () {

// });