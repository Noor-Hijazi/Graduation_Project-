<?php
   
    require_once __DIR__ . '/../models/uplaod_model.inc.php';


    function displayImages(object $pdo){
        // Read images from the database
        $images = readImage($pdo);
        foreach ($images as $image) {
            echo '<div class="image-container">
                    <img src="data:image/jpeg;base64,' . base64_encode($image['image_data']) . '" alt="' . $image['filename'] . '">
                    <p>'.$image['location_name'].'</p>
                  </div>';
        }
    }
    


