<?php
function createMyCarouselTable() {
    $table = $GLOBALS['cfgMc']['table'];
    $query_createMyCarousel_table = "CREATE TABLE IF NOT EXISTS $table (
        id int NOT NULL AUTO_INCREMENT,
        car_name text NOT NULL,
        car_content longtext NOT NULL,
        car_styles longtext NOT NULL,
        car_params longtext NOT NULL,
        car_status bool NOT NULL,
        car_author bigint(20) NOT NULL,
        car_date datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    $createMyCarousel_table = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_createMyCarousel_table));
}
?>