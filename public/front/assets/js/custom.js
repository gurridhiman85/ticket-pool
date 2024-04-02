
var swiper = new Swiper(".card-image-slider", {
    slidesPerView: 4,
      speed: 2000,
    //  setInitialSlide: 0
    grabCursor: true,
    loop:true,
    autoplay: {
        delay: 1,
        disableOnInteraction: false
    },
    breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 4,
      spaceBetween: 40
    }
  }
    // speed: 700,
    // setInitialSlide: 0
});
