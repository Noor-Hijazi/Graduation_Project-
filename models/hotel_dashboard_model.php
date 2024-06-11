<?php
function get_user_details($pdo, $userID) {
    $query = 'SELECT * FROM users WHERE id = :userID';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_user_hotel_reservations($pdo, $userID) {
    $query = '
        SELECT 
            htl_reservation.*, 
            rooms.room_type, 
            rooms.price_per_night, 
            hotels.name, 
            hotels.city 
        FROM 
            htl_reservation
        INNER JOIN 
            rooms ON htl_reservation.room_id = rooms.id
        INNER JOIN 
            hotels ON rooms.hotel_id = hotels.hotel_id
        WHERE 
            htl_reservation.userId = :userId
        ORDER BY 
            htl_reservation.check_in_date DESC
    ';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





function read_rooms_with_reservations($pdo) {
    $stmt = $pdo->prepare("
        SELECT rooms.*, htl_reservation.*
        FROM rooms
        LEFT JOIN htl_reservation ON rooms.id = htl_reservation.room_id
        ORDER BY rooms.id
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



//delete a room 

function delete_room($pdo, $roomId) {
    try {
        $query = 'DELETE FROM rooms WHERE id = :roomId';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
        $stmt->execute();
        return true; // Return true if deletion is successful
    } catch (PDOException $e) {
        // You might want to log the error for debugging purposes
        // echo "Error: " . $e->getMessage();
        return false; // Return false if deletion fails
    }
}


//create Rooms 
function get_hotel_id($pdo, $user_id) {

    $query_hotel = "SELECT hotel_id FROM hotels WHERE userId = :user_id LIMIT 1";
    $stmt = $pdo->prepare($query_hotel);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);


    return $hotel ? $hotel['hotel_id'] : null;
}

function create_room($pdo, $user_id, $room_type, $price_per_night) {

    $hotel_id = get_hotel_id($pdo, $user_id);


    if ($hotel_id) {
      
        $query = 'INSERT INTO rooms (hotel_id, room_type, price_per_night) 
                  VALUES (:hotel_id, :room_type, :price_per_night)';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
        $stmt->bindParam(':room_type', $room_type);
        $stmt->bindParam(':price_per_night', $price_per_night);
     
        $stmt->execute();
        return true; 
    } else {
        return false; 
    }
}



// select room info for spcefic room 

function room_info($pdo , $roomId) {
    $query ='SELECT * FROM rooms WHERE id = :roomId';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':roomId', $roomId);
     
    $stmt->execute();
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
    return $room;

}

    // edit the room info 
    function edit_room_info($pdo, $roomId, $roomType, $pricePerNight, $availabilityStatus) {
        // Prepare the SQL query to update room information
        $query = 'UPDATE rooms 
                  SET room_type = :roomType, 
                      price_per_night = :pricePerNight, 
                      availability_status = :availabilityStatus 
                  WHERE id = :roomId';
        
        // Prepare and execute the statement
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':roomType', $roomType, PDO::PARAM_STR);
        $stmt->bindParam(':pricePerNight', $pricePerNight, PDO::PARAM_STR);
        $stmt->bindParam(':availabilityStatus', $availabilityStatus, PDO::PARAM_STR);
        $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    