<?php
if($_SERVER ["REQUEST_METHOD"] === "POST"){

// start inputes for car table
$userID = $_POST['userID'];
$name = $_POST['name'];

try {
    require_once 'db.inc.php';
    require '../models/car_dashboard_model.php';
    require_once '../controller/car_dashboard_contr.php';
 
    delete_car($pdo, $name);

    $pdo =null ; 
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed from upload: " . $e->getMessage());
}

}
else{
    header("Location: ../views/car_dashboard/delete_car.php");
    exit();
}