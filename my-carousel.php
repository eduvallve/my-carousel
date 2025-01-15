<?php
/**
* Plugin Name: My Carousel
* Plugin URI: https://eduvallve.com
* Description: Custom WordPress plugin for carousels.
* Version: 0.1
* Author: eduvallve
* Author URI: https://eduvallve.com
**/

$cfgMc = array(
    'table' => $GLOBALS['wpdb']->prefix."my_carousel",
);

/**
 * Public (Front-office)
 */

require_once 'public/public.php';

/**
 * Admin page (Back-office)
 */

require_once 'admin/admin.php';

?>