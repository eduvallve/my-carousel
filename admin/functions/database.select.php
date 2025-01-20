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
    return isset($getCarouselData[0]) ? $getCarouselData[0] : null;
}

function selectAllCarouselsList() {
    $table = $GLOBALS['cfgMc']['table'];
    $query_getAllCarousels = "SELECT $table.id, car_name, car_status, display_name AS car_author, car_date FROM $table, wp_users WHERE wp_users.ID = $table.car_author ORDER BY car_date DESC";
    $getAllCarousels = $GLOBALS['wpdb']->get_results($query_getAllCarousels);
    return $getAllCarousels;
}
?>