<?php
require_once 'db.inc.php';
require_once '../models/hotel_dashboard_model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_POST['userID'];
    $roomType = $_POST['room_type'];
    $pricePerNight = $_POST['price_per_night'];


    try {
        // Call the function to create the room
        create_room($pdo, $userID, $roomType, $pricePerNight);
        
        echo '<script>
        alert("Added successfully");
        window.location.href = "../views/hotel_dashboard/Add_rooms.php";
    </script>';   
        exit(); 
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}