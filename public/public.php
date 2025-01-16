<?php
    // echo 'public';

function show_my_carousel($params) {
    // print_r($params);
    echo 'Show carousel #'.$params['id'];

    $data = selectCarouselData($params['id']);
    print_r($data);
}
?>