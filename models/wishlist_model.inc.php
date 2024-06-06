<?php
declare(strict_types=1);


//to add into wishlist
function add_into_wishlist (object $pdo , int $userId , int $itemId)   {
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