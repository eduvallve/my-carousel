<?php
function deleteCarousel($id) {
    $table = $GLOBALS['cfgMc']['table'];
    $query_deleteCarousel = "DELETE FROM $table WHERE id='$id'";
    $deleteCarousel = $GLOBALS['wpdb']->query($GLOBALS['wpdb']-> prepare($query_deleteCarousel));
}
?>