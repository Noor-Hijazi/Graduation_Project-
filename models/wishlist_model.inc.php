<?php
declare(strict_types=1);


//to add into wishlist this is for car 
function add_into_wishlist_cars (object $pdo , int $userId , int $itemId)   {
    $query = "INSERT INTO wishlist (user_id, item_id) VALUES (:userId , :itemId )";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":userId" , $userId); 
    $stmt->bindParam(":itemId" , $itemId); 

    $stmt->execute();
}



// to display from wishlist table for every catagory 

function get_car_from_wishlist (object $pdo , int $userId)   {
    $query = "SELECT car.* FROM wishlist JOIN car ON wishlist.item_id = car.id WHERE wishlist.user_id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userId", $userId);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


// delete a car 

function delete_car_wishlist (object $pdo  , int $userId , int $carId){
    $query = "DELETE FROM wishlist WHERE user_id = :user_id AND item_id = :car_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':car_id', $carId, PDO::PARAM_INT);
    $stmt->execute();
}


// this is for guide
function add_into_wishlist_guides (object $pdo , int $userId , int $itemId)   {
    $query = "INSERT INTO wishlist (user_id, guide_id_wh) VALUES (:userId , :itemId )";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":userId" , $userId); 
    $stmt->bindParam(":itemId" , $itemId); 

    $stmt->execute();
}

// get guides from wishlist 

function get_guids_from_wishlist(object $pdo, int $userId) {
    // Define the SQL query with JOIN between wishlist and guides
    $query = "
        SELECT guids.*
        FROM wishlist 
        JOIN guids ON wishlist.guide_id_wh = guids.guid_id
        WHERE wishlist.user_id = :userId";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);
    
    // Bind the user ID parameter
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch and return all results as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function delete_guide_wishlist (object $pdo  , int $userId , int $guidId){
    $query = "DELETE FROM wishlist WHERE user_id = :user_id AND guide_id_wh = :guidId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':guidId', $guidId, PDO::PARAM_INT);
    $stmt->execute();
}



// this is for rest
function add_into_wishlist_rest (object $pdo , int $userId , int $restaurant_id)   {
    $query = "INSERT INTO wishlist (user_id, rest_id) VALUES (:userId , :restaurant_id )";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":userId" , $userId); 
    $stmt->bindParam(":restaurant_id" , $restaurant_id); 

    $stmt->execute();
}


// get rest from wishlist 

function get_rest_from_wishlist(object $pdo, int $userId) {
    // Define the SQL query with JOIN between wishlist and guides
    $query = "
        SELECT restaurants.*
        FROM wishlist 
        JOIN restaurants ON wishlist.rest_id = restaurants.restaurant_id
        WHERE wishlist.user_id = :userId";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);
    
    // Bind the user ID parameter
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch and return all results as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function delete_rest_wishlist (object $pdo  , int $userId , int $restaurant_id){
    $query = "DELETE FROM wishlist WHERE user_id = :user_id AND rest_id = :restaurant_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
    $stmt->execute();
}




// this is for hotel
function add_into_wishlist_hotel(object $pdo, int $userId, int $hotel_id): bool {
    try {
        $query = "INSERT INTO wishlist (user_id, hotel_id_wh) VALUES (:userId, :hotel_id)";
        $stmt = $pdo->prepare($query);
        
        // Bind parameters with explicit types
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":hotel_id", $hotel_id, PDO::PARAM_INT);
        
        // Execute the statement and return true if successful
        return $stmt->execute();
    } catch (PDOException $e) {
        // Log the exception or handle it as needed
        error_log("Error adding to wishlist: " . $e->getMessage());
        return false;
    }
}


// get hotel from wishlist 

function get_hotel_from_wishlist(object $pdo, int $userId) {
    // Define the SQL query with JOIN between wishlist and guides
    $query = "
        SELECT hotels.*
        FROM wishlist 
        JOIN hotels ON wishlist.hotel_id_wh = hotels.hotel_id
        WHERE wishlist.user_id = :userId";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);
    
    // Bind the user ID parameter
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch and return all results as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function delete_hotel_wishlist (object $pdo  , int $userId , int $hotel_id){
    $query = "DELETE FROM wishlist WHERE user_id = :user_id AND hotel_id_wh = :hotel_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
    $stmt->execute();
}
