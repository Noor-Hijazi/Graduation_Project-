<?php

if($_SERVER ["REQUEST_METHOD"] === "POST"){

    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $menu_url = $_POST['menu_url'];


    // for main_image 
    $file_one = $_FILES['image'];
    $fileName_one  = $_FILES['image']['name'];
    $fileTmpName_one  = $_FILES['image']['tmp_name'];
    $fileSize_one  = $_FILES['image']['size'];
    $fileError_one  = $_FILES['image']['error'];
    $fileType_one  = $_FILES['image']['type'];

    try {
        require_once 'db.inc.php';
        require '../models/rest_dashboard_model.php';
        require_once '../controller/rest_dashboard_conter.php';
        insertion_into_rest($pdo, $userID ,$name,$address,$category,$fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one , $menu_url);

    } catch (PDOException $e) {
        die("Query Failed from insert rest: " . $e->getMessage());
    }
  

}else{
    header("Location: ../views/restaurant_dashboard/delete_rest.php");
    exit();
}