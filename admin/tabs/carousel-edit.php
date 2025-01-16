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
    $c__name = $data->name;
    $c__id = $data->id;
    $c__content = $data->content;
    // $c__styles = $data->styles;
    // $c__params = $data->params;
    // $c__active = $data->active;
}
?>
<!-- My Carousel edition form -->
<form method="post" id="mc-carousel-edit">
    <label class="mc__carousel__name" for="carousel__name">
        Carousel title: <input type="text" name="carousel__name" <?php echo isset($c__name) ? 'value="'.$c__name.'"' : '' ?> required>
    </label>
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
    <p class="submit">
        <input type="submit" class="button-primary" value="Save Changes">
    </p>
</form>