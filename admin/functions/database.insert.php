<?php
function insertCarousel($name, $content, $styles, $params, $active) {
    $table = $GLOBALS['cfgMc']['table'];
    $query_saveNewCarousel = "INSERT INTO $table (name, content, styles, params, active) VALUES ('$name', '$content', '$styles', '$params', '$active')";
    $saveNewCarousel = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_saveNewCarousel));
    // echo 'Created successfully!';
}
?>