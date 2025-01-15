<?php

/**
 * When form is submitted, values must be saved in DB
 */

 if ( isset($_POST) && count($_POST) > 0 ) {
    include "carousel-update.php";
}

/**
 * After saving changes, the editor content is shown
 */
function addCardBtn() {
    ?>
    <li class="page-title-action mc__card--add" data-new-card="<?php echo plugin_dir_url( __FILE__ )."../components/card.php"; ?>">Add card</li>
    <?php
}

function regularCard() {
    include plugin_dir_path( __DIR__ )."components/card.php";
}
?>

<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<p>
    <a class="mc-nav-links" href="/wp-admin/admin.php?page=my-carousel"><span class="dashicons dashicons-arrow-left-alt"></span> Go back</a>
</p>

<!-- My Carousel edition form -->
<form method="post" id="mc-carousel-edit">
    <?php addCardBtn(); ?>
    <input type="hidden" name="carousel__id" value="">
    <ul class="mc__card--list">
    </ul>
    <p class="submit">
        <input type="submit" class="button-primary" value="Save Changes">
    </p>
</form>