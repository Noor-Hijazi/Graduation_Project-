<?php
declare(strict_types=1);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['userId'] ?? null;
    $guestName = $_POST['guest_name'] ?? null;
    $guestEmail = $_POST['guest_email'] ?? null;
    $checkInDate = $_POST['check_in_date'] ?? null;
    $checkOutDate = $_POST['check_out_date'] ?? null;
  
    $roomId = $_POST['room_id'] ?? null;

    // Validate inputs
    if (empty($userId) || empty($guestName) || empty($guestEmail) || empty($checkInDate) || empty($checkOutDate)  || empty($roomId)) {
        die("All fields are required.");
    }

    if (!filter_var($guestEmail, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    try {
        require_once 'db.inc.php'; // Database connection
        require_once '../models/hotel_reservtions_model.php';

          // Calculate duration of stay in days
          $checkIn = new DateTime($checkInDate);
          $checkOut = new DateTime($checkOutDate);
          $duration = $checkIn->diff($checkOut)->days;
  
          // Retrieve price per day for the selected room from the database
          $stmt = $pdo->prepare("SELECT price_per_night FROM rooms WHERE id = :room_id");
          $stmt->bindParam(':room_id', $roomId);
          $stmt->execute();
          $pricePerDay = $stmt->fetchColumn();
  
          // Calculate total price
          $totalPrice = $pricePerDay * $duration;

        hotel_reservtion ($pdo ,$roomId,$guestName,$guestEmail,$checkInDate, $checkOutDate,$userId , $totalPrice);

        echo "<script>alert('Reservation successfully. Total Price: " . $totalPrice . " JOD');window.location.href = '../views/user_dashboad/rooms_reservtion.php';</script>";
        exit();
    } catch (PDOException $e) {
        die("Booking failed: " . $e->getMessage());
    }
} else {
    // If not POST method, redirect to the booking form
    header("Location: ../htl-reservation.php");
    exit();
 
}


