 <?php
require 'db.inc.php';
require '../models/hotel_dashboard_model.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $roomId = $_POST['roomId'];



    $roomType = $_POST['room_type'];


    $pricePerNight = $_POST['price_per_night'];

    $availabilityStatus = $_POST['availability_status'];


    // Call the function to edit room information
    if (edit_room_info($pdo, $roomId,  $roomType, $pricePerNight, $availabilityStatus)) {

         
        echo "<script>alert('Room information updated successfully.');window.location.href = '../views/hotel_dashboard/rooms.php';</script>";

        exit;
    } else {

  
        echo "<script>alert('Failed to update room information.');window.location.href = '../views/hotel_dashboard/rooms.php';</script>";

    
        exit;
    }
} else {
    echo 'not found';
    // Redirect if not a POST request
    header("Location: ../views/hotel_dashboard/edit_room.php");
    exit;
}

