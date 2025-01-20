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

function resetParamsBtn() {
    ?>
    <li class="page-title-action mc__reset--params" data-params='<?php echo $GLOBALS['defaultParams'] ?>'><span class="dashicons dashicons-image-rotate"></span> Reset to default settings</li>
    <?php
}

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
    if (!isset($data)) {
        echo '<span class="mc-not-found"><b>Oops!</b> Carousel not found!</span>
        <a href="?page=my-carousel&tab=carousel-edit" class="page-title-action">Create New Carousel</a>';
        return ''; // Stop rendering if no carousel data is found.
    }
    $c__name = isset($data->car_name) ? $data->car_name : null;
    $c__id = isset($data->id) ? $data->id : null;
    $c__content = isset($data->car_content) ? $data->car_content : null;
    $c__styles = isset($data->car_styles) ? $data->car_styles : null;
    $c__params = isset($data->car_params) ? $data->car_params : null;
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
    <textarea name="carousel__params" class="mc__carousel__params" rows="16" placeholder='<?php echo $GLOBALS['defaultParams']; ?>'><?php echo isset($c__params) ? $c__params : $GLOBALS['defaultParams'] ?></textarea>
    <p><b>Important:</b> "<i>carousel.</i>" is the reference for the current carousel.</p>
    <?php resetParamsBtn(); ?>
    <hr>
    <h2>3. Add custom CSS</h2>
    <p><i>My Carousel</i> comes with a basic CSS. We <b>strongly recommend you</b> to add your custom code into the following space. Your designs will be awesome! Happy coding!</p>
    <textarea name="carousel__styles" class="mc__carousel__styles" rows="20" placeholder="Your custom CSS here!"><?php echo isset($c__styles) ? $c__styles : '' ?></textarea>
    <div class="mc__carousel__action_buttons">
        <?php saveBtn(); ?>
    </div>
</form>