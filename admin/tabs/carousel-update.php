Hello:
<?php
print_r($_POST);
echo '<hr>';

/**
 * Format POST data
 */
function formattedData() {
    $formattedData = [];
    foreach ($_POST as $tag => $dataList) {
        if ($tag !== 'carousel__id') {
            foreach ($dataList as $index => $data) {
                // print_r($data); echo $tag.'<hr>';
                $formattedData[$index][$tag] = $data;
            }
        }
    }
    print_r($formattedData); echo '<hr>';
}

// Create carousel db table if it does not exist
createMyCarouselTable();
formattedData();

if ($_POST['carousel__id'] === '') {
    // New carousel. Insert POST data
    // insertCarousel(formattedData());
} else {
    // Existing carousel. Update POST data
    // updateCarousel();
}
?>