/**
 * Publish JS code
 */

const cfgMcPublic = {
  selectors: {
    carousel: ".mc__carousel",
    swiper: ".swiper-container",
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
    // this.prevBtn = this.el.querySelector('.swiper-button-prev');
    // this.nextBtn = this.el.querySelector('.swiper-button-next');
    // this.pagination = this.el.querySelector('.swiper-pagination');
  }

  initiateSwiper() {
    this.swiper = new Swiper(this.swiperContainer, {
      navigation: {
        prevEl: this.el.querySelector('.swiper-button-prev'),
        nextEl: this.el.querySelector('.swiper-button-next'),
      },
      mousewheel: true,
      pagination: {
        el: this.el.querySelector('.swiper-pagination'),
        type: "fraction",
      },
      scrollbar: {
        enabled: false,
      },
      keyboard: {
        enabled: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        600: {
          slidesPerView: 3,
          spaceBetween: 16,
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 16,
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