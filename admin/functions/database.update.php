<?php
function updateCarousel($id, $name, $content, $styles, $params, $status) {
    $table = $GLOBALS['cfgMc']['table'];
    $query_updateCarousel = "UPDATE $table SET id='$id', car_name='$name', car_content='$content', car_styles='$styles', car_params='$params', car_status='$status' WHERE id='$id'";
    $updateCarousel = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_updateCarousel));
}
?>