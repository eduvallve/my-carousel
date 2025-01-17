<?php
function insertCarousel($name, $content, $styles, $params, $status) {
    $table = $GLOBALS['cfgMc']['table'];
    $author = get_current_user_id();
    $query_saveNewCarousel = "INSERT INTO $table (car_name, car_content, car_styles, car_params, car_status, car_author) VALUES ('$name', '$content', '$styles', '$params', '$status', '$author')";
    $saveNewCarousel = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_saveNewCarousel));
}
?>