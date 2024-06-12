<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/db.inc.php';


//get all information from users
function get_info_user( $pdo , int $id ){
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    
}


//if the rental car is not deleted
function get_rental_car($pdo, int $id) {
    $query = "
        SELECT cr.*, c.*
        FROM car_rental AS cr
        JOIN car AS c ON cr.carID = c.id
        WHERE cr.isDeleted = 0 AND cr.userID = :id
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//if the rental car is deleted so put it in user history page 
function get_rental_car_deleted($pdo, $id){
    $query = "
    SELECT cr.*, c.*
    FROM car_rental AS cr
    JOIN car AS c ON cr.carID = c.id
    WHERE cr.isDeleted = 1 AND cr.userID = :id
";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//get restaurant reservtions 

function get_rest_reservtion(object $pdo , int $id){

            $query = "SELECT ra.*, r.*
            FROM reservations AS ra
            JOIN restaurants AS r ON ra.restaurant_id = r.restaurant_id
            WHERE ra.isDeleted = 0 AND  ra.userId = :id
        ";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//for cancel the resturant reservtion
function remove_rest_reservtion($pdo, $restId, $userId) {
    $query = 'UPDATE reservations SET isDeleted = true WHERE restaurant_id = :restId AND userId = :userId';

    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':restId', $restId, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    echo "Reservation successfully removed.";
}


// get rest had canceled

function get_rest_reservtion_deleted($pdo, $id){
    $query = "SELECT ra.*, r.*
    FROM reservations AS ra
    JOIN restaurants AS r ON ra.restaurant_id = r.restaurant_id
    WHERE ra.isDeleted = 1 AND  ra.userId = :id
";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//get guide trips


function get_trip_reservtion(object $pdo , int $id){

        $query = "SELECT ra.*, r.*
        FROM guids_reservation AS ra
        JOIN guids AS r ON ra.guid_id = r.guid_id
        WHERE ra.isDeleted = 0 AND  ra.userID = :id
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//for cancel the resturant reservtion
function remove_trip_reservtion($pdo, $guid_id, $userId) {
    $query = 'UPDATE guids_reservation SET isDeleted = true WHERE guid_id = :guid_id AND userID = :userId';

    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':guid_id', $guid_id, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    echo "Reservation successfully removed.";
}

//cancel
function get_trip_reservtion_deleted(object $pdo , int $id){

    $query = "SELECT ra.*, r.*
    FROM guids_reservation AS ra
    JOIN guids AS r ON ra.guid_id = r.guid_id
    WHERE ra.isDeleted = 1 AND  ra.userID = :id
";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function get_room_reservtion($pdo, $userId) {
    $query = '
        SELECT 
            htl_reservation.*, 
            rooms.*, 
            hotels.*
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
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function remove_room_reservation($pdo, $reservation_id) {
    try {
        // Prepare the DELETE statement
        $query = "DELETE FROM htl_reservation WHERE reservation_id = :reservation_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);

        // Execute the DELETE statement
        $stmt->execute();

        // Check if any row was affected
        if ($stmt->rowCount() > 0) {
            return [
                'status' => 'success',
                'message' => 'Reservation removed successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Reservation not found.'
            ];
        }
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Failed to remove reservation: ' . $e->getMessage()
        ];
    }
}



