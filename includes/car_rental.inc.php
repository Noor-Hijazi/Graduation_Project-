<?php
    session_start();
    $userId = $_SESSION['user_id'];
    require_once 'db.inc.php';
    require '../models/car_rental_model.inc.php';
    require_once '../controller/car_rental_contr.inc.php';


    //for remove the rental
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['carId'])){
    $carId = $_POST['carId'];
    remove_rental($pdo, $carId, $userId) ; 
}
//for add the rental
else if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['driving_license'] == 1 && isset($_FILES['image']) && $_FILES['image']['error'] == 0){
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
        create_rental($pdo,$carId ,$userId,$start_date,$end_date, $location_from ,$location_to,$fileName, $fileTmpName, $fileSize, $fileError, $fileType);

        header("Location: ../'../views/user_dashboad/user_reservations.php'?ID=" . $carId);
        die();

    } catch (PDOException $e) {
        die("Query Failed from upload: " . $e->getMessage());
    }
 
}

else {
   
    $carId = isset($_POST['carID']) ? $_POST['carID'] :0;
    // If not submitted as POST method or other conditions not met
    header("Location:../'../views/user_dashboad/user_reservations.php?ID=" . $carId);
    exit();
}