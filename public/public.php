<?php

function mycarousel_enqueue_public() {
    wp_enqueue_script('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
    wp_enqueue_style('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('my_carousel_custom_script', plugin_dir_url(__FILE__) . 'js/public.js');
    wp_enqueue_style('my_carousel_custom_style', plugin_dir_url(__FILE__) . 'css/public.css');
}

add_action('wp_enqueue_scripts', 'mycarousel_enqueue_public');

function buildCards($id) {
    $data = selectCarouselData($id);
    if ($data === '') {
        echo 'Carousel not found.';
        return ''; // Stop rendering if no carousel data is found.
    }

    $c__content = $data->car_content;

    if(isset($c__content)) {
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
}

function buildCarousel($id) {
    ?>
    <div class="mc__carousel">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php buildCards($id); ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <?php
}

function show_my_carousel($params) {
    $id = $params['id'];
    buildCarousel($id);
}
?>