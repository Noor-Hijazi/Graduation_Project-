<?php

require_once __DIR__ . '/../models/uplaod_model.inc.php';

function displayImages(object $pdo) {
    // Fetch images from the database
    $images = readImage($pdo);
    $count = 0;
    foreach ($images as $image) {
        if ($count >= 8) break;

        echo '<div class="image-container">';

        if (isset($image['image_data']) && !empty($image['image_data'])) {
            // Display image from BLOB data
            echo '<img src="data:image/jpeg;base64,' . base64_encode($image['image_data']) . '" alt="' . htmlspecialchars($image['filename'], ENT_QUOTES, 'UTF-8') . '" class="location-image" />';
        } elseif (isset($image['Image_url']) && !empty($image['Image_url'])) {
            // Display image from URL
            echo '<img src="' . htmlspecialchars($image['Image_url'], ENT_QUOTES, 'UTF-8') . '" alt="Image not found" class="location-image" />';
        } else {
            // Fallback in case no image data is available
            echo '<img src="default_image.jpg" alt="Default Image" class="location-image" />';
        }

        echo '<p>' . htmlspecialchars($image['location_name'], ENT_QUOTES, 'UTF-8') . '</p>';
        echo '</div>';

        $count++;
    }
}
?>
