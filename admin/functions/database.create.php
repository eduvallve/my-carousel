<?php
function createMyCarouselTable() {
    $table = $GLOBALS['cfgMc']['table'];
    $query_createMyCarousel_table = "CREATE TABLE IF NOT EXISTS $table (
        id int NOT NULL AUTO_INCREMENT,
        name text NOT NULL,
        content longtext NOT NULL,
        styles longtext NOT NULL,
        params longtext NOT NULL,
        active bool NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    $createMyCarousel_table = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_createMyCarousel_table));
}
?>