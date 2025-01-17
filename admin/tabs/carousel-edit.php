<?php

/**
 * When form is submitted, values must be saved in DB
 */

if ( isset($_POST) && count($_POST) > 0 ) {
    include "carousel-update.php";
}

/**
 * Otherwise, the editor content is shown
 */
function addCardBtn() {
    ?>
    <li class="page-title-action mc__card--add" data-new-card="<?php echo plugin_dir_url( __FILE__ )."../components/card.php"; ?>">Add card</li>
    <?php
}

function saveBtn() {
    ?>
    <p class="submit">
        <input type="submit" class="button-primary" value="Save Changes">
    </p>
    <?php
}

function regularCard($card) {
    $showhide = $card->mc__card__showhide__state;
    $img = $card->mc__card__img;
    $alt = $card->mc__card__img__alt;
    $title = $card->mc__card__title;
    $subtitle = $card->mc__card__subtitle;
    $btn = $card->mc__card__btn;
    $url = $card->mc__card__btn__url;
    include plugin_dir_path( __DIR__ )."components/card.php";
}

$defaultParams = "{
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

?>

<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<p>
    <a class="mc-nav-links" href="/wp-admin/admin.php?page=my-carousel"><span class="dashicons dashicons-arrow-left-alt"></span> Go back</a>
</p>

<?php
/**
 * In case of editing existing Carousel, we must get its data from DB.
 */
if (isset($_GET) && isset($_GET['carousel-id']) && $_GET['carousel-id'] !== '') {
    $data = selectCarouselData($_GET['carousel-id']);
    if ($data === '') {
        echo 'Carousel not found.';
        return ''; // Stop rendering if no carousel data is found.
    }
    // print_r($data);
    $c__name = $data->car_name;
    $c__id = $data->id;
    $c__content = $data->car_content;
    // $c__author = $data->car_author;
    // $c__date = $data->car_date;
    $c__styles = $data->car_styles;
    $c__params = $data->car_params;
    // $c_status = $data->car_status;
}
?>
<!-- My Carousel edition form -->
<form method="post" id="mc-carousel-edit">
    <div class="mc__carousel__main__data">
        <label class="mc__carousel__name" for="carousel__name">
            Carousel title: <input type="text" name="carousel__name" <?php echo isset($c__name) ? 'value="'.$c__name.'"' : '' ?> required>
        </label>
        <?php if (isset($c__id)) { ?>
            <span class="mc__carousel__shortcode">Shortcode: <pre><?php echo '[my-carousel id="'.$c__id.'"]'; ?></pre></span>
        <?php } ?>
    </div>
    <hr>
    <h2>1. Add cards</h2>
    <p>Add as many cards as you need</p>
    <?php addCardBtn(); ?>
    <!-- <div class="mc__carousel__action_buttons">
    </div> -->
    <input type="hidden" name="carousel__id" <?php echo isset($c__id) ? 'value="'.$c__id.'"' : '' ?>>
    <ul class="mc__card--list">
        <?php if(isset($c__content)) {
            $cards = json_decode($c__content);
            if (isset($cards)) {
                foreach ($cards as $card) {
                    regularCard($card);
                }
            }
        } ?>
    </ul>
    <hr>
    <h2>2. Add settings</h2>
    <p><i>My Carousel</i> is powered by <a href="https://swiperjs.com/" target="_blank">swiper.js</a>. You can add as many customizations from its <b><a href="https://swiperjs.com/get-started" target="_blank">swiper.js documentation</a></b> <span class="dashicons dashicons-media-document"></span> in the following space:</p>
    <textarea name="carousel__params" class="mc__carousel__params" rows="12" placeholder="<?php echo $defaultParams; ?>"><?php echo isset($c__params) ? $c__params : $defaultParams ?></textarea>
    <p><b>Important:</b> "<i>this.el</i>" is the reference for the current carousel.</p>
    <hr>
    <h2>3. Add custom CSS</h2>
    <p><i>My Carousel</i> comes with a basic CSS. We <b>strongly recommend you</b> to add your custom code into the following space. Your designs will be awesome! Happy coding!</p>
    <textarea name="carousel__styles" class="mc__carousel__styles" rows="12" placeholder="Your custom CSS here!"><?php echo isset($c__styles) ? $c__styles : '' ?></textarea>
    <div class="mc__carousel__action_buttons">
        <?php saveBtn(); ?>
    </div>
</form>