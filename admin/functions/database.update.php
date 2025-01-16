<?php
function updateCarousel($id, $name, $content, $styles, $params, $active) {
    $table = $GLOBALS['cfgMc']['table'];
    $query_updateCarousel = "UPDATE $table SET id='$id', name='$name', content='$content', styles='$styles', params='$params', active='$active' WHERE id='$id'";
    $updateCarousel = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_updateCarousel));
    // echo 'Updated successfully!';
}
?>