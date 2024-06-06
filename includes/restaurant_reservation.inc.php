<?php
session_start();
    $userId = $_SESSION['user_id'];
    require_once 'db.inc.php';
    require '../models/user_dashboard_model.php';
    // require_once '../controller/';


    //for remove the rental
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reservationId'])){
    $restId = $_POST['reservationId'];
    remove_rest_reservtion($pdo, $restId, $userId) ;


}
else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['guid_id'])){
    $guid_id = $_POST['guid_id'];
    remove_trip_reservtion($pdo, $guid_id, $userId) ;
}
else{

    header("Location: ../views/user_dashboad/user_reservations.php");
    exit();
}