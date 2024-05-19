<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['driving_license'] == 1 && isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $carId = $_POST['carID'];
    $userId = $_POST['userID'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $location_from = $_POST['location_from'];
    $location_to = $_POST['location_to'];
    // $number_of_car = $_POST['number_of_car'];
    // $payment_method = $_POST['payment_method'];

    
    // to handel the image 
    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];




    try {
        require_once 'db.inc.php';
        require 'car_rental_model.inc.php';
        require_once 'car_rental_contr.inc.php';
 
        
        create_rental($pdo,$carId ,$userId,$start_date,$end_date, $location_from ,$location_to,$fileName, $fileTmpName, $fileSize, $fileError, $fileType);

      

 



    } catch (PDOException $e) {
        die("Query Failed from upload: " . $e->getMessage());
    }
 
}

else {
   
    $carId = isset($_POST['carID']) ? $_POST['carID'] :0;
    // If not submitted as POST method or other conditions not met
    header("Location: ../moreCar.php?ID=" . $carId);
    exit();
}