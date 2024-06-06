<?php

if($_SERVER ["REQUEST_METHOD"] === "POST"){

    // start inputes for car table
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel'];
    $seats = $_POST['seats'];
    $renal_price = $_POST['renal_price'];
    $model = $_POST['model'];


    // for main_image in car table
    $color = $_POST['color'];
    $number = $_POST['number'];
    $kms_driven = $_POST['kms_driven'];

    $file_one = $_FILES['image_one'];
    $fileName_one  = $_FILES['image_one']['name'];
    $fileTmpName_one  = $_FILES['image_one']['tmp_name'];
    $fileSize_one  = $_FILES['image_one']['size'];
    $fileError_one  = $_FILES['image_one']['error'];
    $fileType_one  = $_FILES['image_one']['type'];


    $file_two = $_FILES['image_two'];
    $fileName_two = $_FILES['image_two']['name'];
    $fileTmpName_two = $_FILES['image_two']['tmp_name'];
    $fileSize_two = $_FILES['image_two']['size'];
    $fileError_two = $_FILES['image_two']['error'];
    $fileType_two = $_FILES['image_two']['type'];

    $file_three = $_FILES['image_three'];
    $fileName_three = $_FILES['image_three']['name'];
    $fileTmpName_three = $_FILES['image_three']['tmp_name'];
    $fileSize_three = $_FILES['image_three']['size'];
    $fileError_three = $_FILES['image_three']['error'];
    $fileType_three = $_FILES['image_three']['type'];



  //End inputes for car table


  //for car detail  table

  $file = $_FILES['image'];
  $fileName = $_FILES['image']['name'];
  $fileTmpName = $_FILES['image']['tmp_name'];
  $fileSize = $_FILES['image']['size'];
  $fileError = $_FILES['image']['error'];
  $fileType = $_FILES['image']['type'];
    try {
        require_once 'db.inc.php';
        require '../models/car_dashboard_model.php';
        require_once '../controller/car_dashboard_contr.php';
        insertion_into_car($pdo, $userID, $name, $brand, $transmission, $fuel, $seats, $renal_price, $model, $fileName, $fileTmpName, $fileSize, $fileError, $fileType);
        insertion_into_cardetail ($pdo,$fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one
    
        ,$fileName_two, $fileTmpName_two, $fileSize_two, $fileError_two, $fileType_two,
        $fileName_three, $fileTmpName_three, $fileSize_three, $fileError_three, $fileType_three,$color,$number,$kms_driven

    );
    } catch (PDOException $e) {
        die("Query Failed from upload: " . $e->getMessage());
    }

}else{
    header("Location: ../views/car_dashboard/insert_car.php");
    exit();
}