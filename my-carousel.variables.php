<?php
$cfgMc = array(
  'table' => $GLOBALS['wpdb']->prefix."my_carousel",
);

$GLOBALS['defaultParams'] = '{
    navigation: {
      prevEl: carousel.querySelector(".swiper-button-prev"),
      nextEl: carousel.querySelector(".swiper-button-next"),
    },
    mousewheel: true,
    pagination: {
      el: carousel.querySelector(".swiper-pagination"),
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
  }';
?>