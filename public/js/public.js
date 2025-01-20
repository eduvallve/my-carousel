/**
 * Publish JS code
 */

const cfgMcPublic = {
  selectors: {
    swiper: ".swiper-container",
  },
};

/** Basic class */
class BasicMcComponent {
  constructor(el, params) {
    this.el = el;
    this.params = params;
  }
}

/** Swiper */
class Carousel extends BasicMcComponent {
  constructor(el, params) {
    super(el, params);
    this.init();
  }

  init() {
    this.setRefs();
    this.initiateSwiper();
  }

  setRefs() {
    this.swiperContainer = this.el.querySelector(cfgMcPublic.selectors.swiper);
  }

  initiateSwiper() {
    this.swiper = new Swiper(this.swiperContainer, this.params);
  }
}
