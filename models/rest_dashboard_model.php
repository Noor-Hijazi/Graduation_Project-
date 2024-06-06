<?php
declare(strict_types=1);

function insert_into_restaurant($pdo, $userID, $name, $address, $category, $fileName_one, $imageData_one, $menu_url) {
    $query = "INSERT INTO restaurants (user_id, name, address, category, img_url, image_data_one, menu_url) 
              VALUES (:userID, :name, :address, :category, :image_one, :image_data_one, :menu_url)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userID", $userID);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":image_one", $fileName_one);
    $stmt->bindParam(':image_data_one', $imageData_one, PDO::PARAM_LOB);
    $stmt->bindParam(":menu_url", $menu_url);
    $stmt->execute();
}


// to delete a rest


function delete_a_rest($pdo, $name) {
    $sql = "DELETE FROM restaurants WHERE name = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $rowCount = $stmt->rowCount(); // Number of rows affected
    return $rowCount;
}


// to read the restuerants

function read_rest(object $pdo, int $userId): array {
    $query = "SELECT * FROM restaurants WHERE user_id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//to read the rest information for the edit page
function get_rest_detail(object $pdo, $restId){
    $query = "SELECT * FROM restaurants WHERE restaurant_id = :restId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':restId', $restId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function Update_rest($pdo, $restId, $name, $address, $category, $fileName_one, $imageData_one, $menu_url) {
    $query = 'UPDATE restaurants SET name = :name, address = :address, category = :category, img_url = :image_one, image_data_one = :imageData_one, menu_url = :menu_url WHERE restaurant_id = :restId';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":restId", $restId, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":address", $address, PDO::PARAM_STR);
    $stmt->bindParam(":category", $category, PDO::PARAM_STR);
    $stmt->bindParam(":image_one", $fileName_one, PDO::PARAM_STR);
    $stmt->bindParam(':imageData_one', $imageData_one, PDO::PARAM_LOB);
    $stmt->bindParam(":menu_url", $menu_url, PDO::PARAM_STR);

    $stmt->execute();
}