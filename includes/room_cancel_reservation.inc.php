<?php
session_start();
    $userId = $_SESSION['user_id'];
    require_once 'db.inc.php';
    require '../models/user_dashboard_model.php';
    


    //for remove the rental
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST ['reservation_id'])){
    $reservation_id = $_POST['reservation_id'];
    remove_room_reservation($pdo, $reservation_id) ;
    echo "<script>alert('Resevtions Canceled successfully.');window.location.href = '../views/user_dashboad/rooms_reservtion.php';</script>";


}
