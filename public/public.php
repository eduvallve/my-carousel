<?php

/**
 * Add Swiper JS and CSS files
 */
function mycarousel_enqueue_public() {
    wp_enqueue_script('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
    wp_enqueue_style('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('my_carousel_custom_script', plugin_dir_url(__FILE__) . 'js/public.js');
    wp_enqueue_style('my_carousel_custom_style', plugin_dir_url(__FILE__) . 'css/public.css');
}

add_action('wp_enqueue_scripts', 'mycarousel_enqueue_public');


/**
 * Formatted Styles
 */

function formattedStyles($id, $c__styles) {
    $carouselClass = ".mc__carousel--$id";
    $lines = explode("\n", $c__styles);
    foreach ($lines as $i => $line) {
        $conditions = (stripos($line, '{') !== false && stripos($line, '@') === false) || (stripos($line, ',') !== false && stripos($line, '(') === false);
        if ($conditions) {
            $lines[$i] = $carouselClass.' '.$line;
        }
    }
    return implode("\n", $lines);
}

/**
 * Layout functions
 */

function buildCards($c__content) {
    $cards = json_decode($c__content);

    if (isset($cards)) {
        foreach ($cards as $card) {

            $showhide = $card->mc__card__showhide__state;
            $img = $card->mc__card__img;
            $alt = $card->mc__card__img__alt;
            $title = $card->mc__card__title;
            $subtitle = $card->mc__card__subtitle;
            $btn = $card->mc__card__btn;
            $url = $card->mc__card__btn__url;

            if (isset($showhide) && $showhide === 'true') {
                $tag = isset($url) && $url !== '' ? 'a' : 'div';
                ?>
                    <div class="swiper-slide">
                        <<?php echo $tag; ?> class="mc__swiper__card" <?php echo isset($url) && $url !== '' ? "href='${url}'" : '' ?>>
                            <?php if (isset($img) && $img !== '') {  ?>
                                <div class="mc__swiper__card__img">
                                    <img src="<?php echo $img; ?>" alt="<?php echo isset($alt) ? $alt : ''; ?>" class="mc__swiper__card__asset">
                                </div>
                            <?php } ?>
                            <div class="mc__swiper__card__content <?php
                            $noText = (!isset($title) || $title === '') && (!isset($subtitle) || $subtitle === '') && (!isset($btn) || $btn === '');
                            echo $noText ? 'hidden' : '' ;
                            ?>">
                                <?php if (isset($title) && $title !== '') { ?><h2 class="mc__swiper__card__title"><?php echo $title; ?></h2><?php } ?>
                                <?php if (isset($subtitle) && $subtitle !== '') { ?><p class="mc__swiper__card__subtitle"><?php echo $subtitle; ?></p><?php } ?>
                                <?php if (isset($btn) && $btn !== '') { ?><span class="mc__swiper__card__btn"><?php echo $btn; ?></span><?php } ?>
                            </div>
                        </<?php echo $tag; ?>>
                    </div>
                <?php
            }
        }
    }
}

function buildCarousel($data) {
    ?>
    <div class="mc__carousel">
        <div class="swiper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php isset($data->car_content) ? buildCards($data->car_content) : ''; ?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <?php
}

$GLOBALS['shownCarousels'] = [];

function show_my_carousel($params) {
    if (!is_admin()) {
        $id = $params['id'];
        $data = selectCarouselData($id);
        if ($data === '') {
            echo 'Carousel not found.';
            return ''; // Stop rendering if no carousel data is found.
        }

        /**
         * Place the carousel wjere the shortcode is
         */
        ?>
            <div class="mc__carousel--<?php echo $id; ?>">
                <?php buildCarousel($data); ?>
            </div>

        <?php

        /**
         * Initiate all instances of the same carousel just once. Avoid repetition
         */
        if (!in_array($id, $GLOBALS['shownCarousels'])) {
            array_push($GLOBALS['shownCarousels'], $id);
            ?>

            <script>
                window.addEventListener("load", function () {
                    document
                    .querySelectorAll(".mc__carousel--<?php echo $id; ?>")
                    .forEach((carousel) => {
                        new Carousel(carousel, <?php echo $data->car_params; ?>);
                    });
                });
            </script>

            <style>
                <?php echo formattedStyles($id, $data->car_styles); ?>
            </style>

            <?php
        }
    }
}
?>