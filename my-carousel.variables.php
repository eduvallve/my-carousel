<?php


$cfgMc = array(
  'table' => $GLOBALS['wpdb']->prefix."my_carousel",
);


$GLOBALS['defaultParams'] = "{
    navigation: {
      prevEl: this.el.querySelector('.swiper-button-prev'),
      nextEl: this.el.querySelector('.swiper-button-next'),
    },
    mousewheel: true,
    pagination: {
      el: this.el.querySelector('.swiper-pagination'),
      type: 'fraction',
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
  }";

// function successMessage($msg) {
//     echo "<div class='md-msg md-msg__success'>$msg</div>";
// }

// function warningMessage($msg) {
//     echo "<div class='md-msg md-msg__warning'>$msg</div>";
// }

// function infoMessage($msg) {
//     echo "<div class='md-msg md-msg__info'>$msg</div>";
// }

?>