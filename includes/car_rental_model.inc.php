<?php
declare(strict_types=1);

require_once 'db.inc.php';

//get all inforntion from car table
function get_car_info(object $pdo , $carId){
    $query ="SELECT * FROM car WHERE id = :carId;";

   
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":carId" , $carId);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
    }



    
    // Insert image into the database
    function insert_image($pdo,$carId,$userId,$start_date,$end_date, $location_from ,$location_to,$fileName, $imageData) {
        $query = "INSERT INTO car_rental (carID, userID, start_date, end_date, location_from, location_to, filename, image_data) VALUES (:carId, :userId, :start_date, :end_date, :location_from, :location_to, :fileName, :imageData)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":carId", $carId, PDO::PARAM_INT);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam(":end_date", $end_date);
        $stmt->bindParam(":location_from", $location_from);
        $stmt->bindParam(":location_to", $location_to);
        $stmt->bindParam(":fileName", $fileName);
        $stmt->bindParam(':imageData', $imageData, PDO::PARAM_LOB);

        $stmt->execute();
    }
    
    
    // // to read the images 
    // function readImage(object $pdo){
       
    //     // Retrieve images from the database
    //     $stmt = $pdo->query("SELECT * FROM images");
    //     $stmt->execute();
    
    //     // to grab the data row 
    //     // fetch one piece of data from database
    //     //FETCH_ASSOC -> means fetch the data as assocative array
    //     $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //     return $result;
    // }
    
    
 