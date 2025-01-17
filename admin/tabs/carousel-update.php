<?php

/**
 * Format POST data
 */
function formattedData() {
    $formattedData = [];
    foreach ($_POST as $tag => $dataList) {
        if ($tag !== 'carousel__id' && $tag !== 'carousel__name' && $tag !== 'carousel__params' && $tag !== 'carousel__styles') {
            foreach ($dataList as $index => $data) {
                $formattedData[$index][$tag] = $data;
            }
        }
    }
    return json_encode($formattedData, JSON_UNESCAPED_UNICODE);
}

// Create carousel db table if it does not exist
createMyCarouselTable();
// Format content data in a JSON style
$content = formattedData();

if ($_POST['carousel__id'] === '') {
    // New carousel. Insert POST data
    insertCarousel($_POST['carousel__name'], $content, $_POST['carousel__styles'], $_POST['carousel__params'], true);
    ?>
    <script>
        window.location.href = `${window.location.href}?page=my-carousel&tab=carousel-edit&carousel-id=<?php echo selectLatestId(); ?>`;
    </script>
    <?php
} else {
    // Existing carousel. Update POST data
    updateCarousel($_POST['carousel__id'], $_POST['carousel__name'], $content, $_POST['carousel__styles'], $_POST['carousel__params'], true);
}
?>