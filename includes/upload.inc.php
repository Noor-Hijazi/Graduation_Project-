<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $userID = $_POST['id'];
    $location = $_POST['location'];
    $rating = $_POST['experience'];
    
    
    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    try {
        require_once 'db.inc.php';
        require '../models/uplaod_model.inc.php';
        require_once '../controller/upload_contr.inc.php';

        handle_image_upload($pdo,$location,$rating, $fileName, $fileTmpName, $fileSize, $fileError, $fileType,$userID );
    } catch (PDOException $e) {
        die("Query Failed from upload: " . $e->getMessage());
    }
} else {
    // If not submitted as POST method, redirect to the index page
    header("Location: ../images.php");
    exit();
}
?>
