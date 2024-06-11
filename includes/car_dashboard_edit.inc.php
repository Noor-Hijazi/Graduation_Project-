<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $carId = $_POST['carId'] ;
    $name = $_POST['name'] ;
    $brand = $_POST['brand'] ;
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel'];
    $seats = $_POST['seats'];
    $rental_price = $_POST['rental_price'] ;
    $model = $_POST['model'];

    // For main_image in car table
    $color = $_POST['color'];
    $number = $_POST['number_of_car'];
    $kms_driven = $_POST['kms_driven'] ;


    // For car  table
    $file = $_FILES['main_image'] ;
    $fileName = $file['name'] ;
    $fileTmpName = $file['tmp_name'] ;
    $fileSize = $file['size'] ;
    $fileError = $file['error'] ;
    $fileType = $file['type'] ;

    try {
        require_once 'db.inc.php';
        require '../models/car_dashboard_model.php';
        require_once '../controller/car_dashboard_contr.php';


        edit_car_contr($pdo, $carId, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $fileTmpName, $fileSize, $fileError, $fileType);

        
        edit_cardetail_contr($pdo,$color,$number,$kms_driven);

        // echo "<script>alert('Car details updated successfully.');window.location.href = '../views/car_dashboard/edite_car.php?ID=$carId';</script>";
    } catch (PDOException $e) {
        die("Query Failed from edit car: " . $e->getMessage());
    }

} else {
    header("Location: ../views/car_dashboard/edite_car.php");
    exit();
}

