<?php

// Validate and handle image upload
function handle_image_upload($pdo,$location,$rating, $fileName, $fileTmpName, $fileSize, $fileError, $fileType,$userID ) {
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileActualExt = strtolower($fileExt);
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 600000) {
                $imageData = file_get_contents($fileTmpName);
                insert_image($pdo, $location,$rating, $fileName, $imageData,$userID);
                // echo "Thank You For This Sharing.";
                header('Location: ../index.php');
                $pdo = null;
                $stmt=null;
                exit();
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was an error uploading your image!';
        }
    } else {
        echo "You cannot upload images of this type!";
    }
}
?>
