<?php

 
 if($_SERVER ["REQUEST_METHOD"] === "POST" ){

// start inputes for car table
$roomId = (int) $_POST['roomId'];

try {
    require_once 'db.inc.php';
    require '../models/hotel_dashboard_model.php';


    if (delete_room($pdo , $roomId)) {
        echo '<script>
        alert("Deleted successfully");
        window.location.href = "../views/hotel_dashboard/rooms.php";
    </script>';   
 } else {
        echo '<script>
        alert("Failed Delete");
        window.location.href = "../views/hotel_dashboard/rooms.php";
    </script>'; 
    }

    $pdo =null ; 
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed from delete services : " . $e->getMessage());
}

}
else{

    header("Location: ../views/hotel_dashboard/rooms.php");
    exit();
}