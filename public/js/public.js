/**
 * Publish JS code
 */

const cfgMcPublic = {
  selectors: {
    carousel: ".mc__carousel",
    swiper: ".swiper",
  },
};

/** Basic class */
class BasicMcComponent {
  constructor(el) {
    this.el = el;
  }
}

/** Swiper */
class Carousel extends BasicMcComponent {
  constructor(el) {
    super(el);
    this.init();
  }

  init() {
      console.log('init');
    this.setRefs();
    this.initiateSwiper();
  }

  setRefs() {
    this.swiperContainer = this.el.querySelector(cfgMcPublic.selectors.swiper);
  }

  initiateSwiper() {
    this.swiper = new Swiper(this.swiperContainer, {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      scrollbar: {
        enabled: false,
      },
      slidesPerView: 4,
      spaceBetween: 20,
      keyboard: {
        enabled: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 2
        },
        600: {
          slidesPerView: 3
        },
        992: {
          slidesPerView: 4
        }
      },
    });
  }
}

/**
 * Initialize first load class instances
 */

window.addEventListener("load", function () {
  document
    .querySelectorAll(cfgMcPublic.selectors.carousel)
    .forEach((carousel) => {
        new Carousel(carousel);
    });
});