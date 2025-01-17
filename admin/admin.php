<?php

/**
 * Admin page (back-office)
 */

require_once "functions/database.create.php";
require_once "functions/database.insert.php";
require_once "functions/database.update.php";
require_once "functions/database.select.php";
require_once "functions/database.delete.php";

require_once "admin.dashboard.php";

add_action( 'admin_menu', 'my_admin_menu_my_carousel' );

function my_admin_menu_my_carousel() {
    // createDB_pluginTables();
    add_menu_page(
        'My Carousel',
        'My Carousel',
        'manage_options',
        'my-carousel',
        'mycarousel_admin_page',
        'dashicons-slides',
        82
    );
}

function mycarousel_enqueue() {
    // wp_enqueue_script('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
    // wp_enqueue_style('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('my_carousel_custom_script', plugin_dir_url(__FILE__) . 'js/admin.js');
    wp_enqueue_style('my_carousel_custom_style', plugin_dir_url(__FILE__) . 'css/admin.css');
}

add_action('admin_enqueue_scripts', 'mycarousel_enqueue');

// Create the shortcode to locate the carousels in the site
add_shortcode( 'my-carousel', 'show_my_carousel' );


?>
