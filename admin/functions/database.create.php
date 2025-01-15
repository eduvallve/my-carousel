<?php
function createMyCarouselTable() {
    $table = $GLOBALS['cfgMc']['table'];
    $query_createMyCarousel_table = "CREATE TABLE IF NOT EXISTS $table (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        content varchar(2048) NOT NULL,
        styles varchar(255) NOT NULL,
        params varchar(2048) NOT NULL,
        active bool NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    // print($query_createMyCarousel_table);
    $createMyCarousel_table = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_createMyCarousel_table));
}
?>