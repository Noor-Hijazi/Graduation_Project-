<?php
if($_SERVER ["REQUEST_METHOD"] === "POST"){

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
    $language = $_POST['language'];
    $can_go = $_POST['can_go'];

    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        $photoName = $photo['name'];
        $photoTmpName = $photo['tmp_name'];
        $photoSize = $photo['size'];
        $photoError = $photo['error'];
        $photoType = $photo['type'];

try {
    require_once 'db.inc.php';
    require '../models/admin_dashboard_model.php';
    require_once '../controller/admin_dashboard_contr.php';
    

        // Check for errors
     insertion_into_guide ($pdo ,$name,$email,$experience,$language, $can_go, $photo, $photoName, $photoTmpName, $photoSize,$photoError,$photoType);
  
    $pdo =null ; 
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed from guides: " . $e->getMessage());
}
}
}
else{
    header("Location: ../views/admin_dashboard/guides.php");
    exit(); 
}