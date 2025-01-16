<?php
function selectLatestId() {
    $table = $GLOBALS['cfgMc']['table'];
    $query_getLatestId = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
    $getLatestId = $GLOBALS['wpdb']->get_results($query_getLatestId);
    return $getLatestId[0]->id;
}

function selectCarouselData($id) {
    $table = $GLOBALS['cfgMc']['table'];
    $query_getCarouselData = "SELECT * FROM $table WHERE id = $id";
    $getCarouselData = $GLOBALS['wpdb']->get_results($query_getCarouselData);
    return $getCarouselData[0];
}

function selectAllCarouselsList() {
    $table = $GLOBALS['cfgMc']['table'];
    $query_getAllCarousels = "SELECT id, name, active FROM $table ORDER BY id DESC";
    $getAllCarousels = $GLOBALS['wpdb']->get_results($query_getAllCarousels);
    return $getAllCarousels;
}
?>