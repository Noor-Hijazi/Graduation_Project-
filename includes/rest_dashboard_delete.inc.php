<?php
if($_SERVER ["REQUEST_METHOD"] === "POST"){

// start inputes for car table
$userID = $_POST['userID'];
$name = $_POST['name'];

try {
    require_once 'db.inc.php';
    require '../models/rest_dashboard_model.php';
    require_once '../controller/rest_dashboard_conter.php';
 
    delete_rest($pdo, $name);

    $pdo =null ; 
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed from upload: " . $e->getMessage());
}

}
else{
    header("Location: ../views/restaurant_dashboard/delete_rest.php");
    exit();
}