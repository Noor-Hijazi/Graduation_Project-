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
    try {
        // Update the restaurant to mark it as deleted
        $sql = "UPDATE restaurants SET isDeleted = 1 WHERE LOWER(name) = LOWER(:name) AND isDeleted = 0";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        
        // Return the number of rows affected
        return $stmt->rowCount();
    } catch (PDOException $e) {
        // Log and return an error code if the update fails
        error_log("Error in delete_a_rest: " . $e->getMessage());
        return 0;
    }
}

function delete_a_rest_by_ides($pdo, $restId) {
    try {
        // Update the restaurant to mark it as deleted
        $sql = "UPDATE restaurants SET isDeleted = 1 WHERE restaurant_id  = :restId AND isDeleted = 0";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':restId', $restId, PDO::PARAM_STR);
        $stmt->execute();
        
        // Return the number of rows affected
        return $stmt->rowCount();
    } catch (PDOException $e) {
        // Log and return an error code if the update fails
        error_log("Error in delete_a_rest: " . $e->getMessage());
        return 0;
    }
}



// to read the restuerants

function read_rest(object $pdo, int $userID) {
    $sql = "SELECT * FROM restaurants WHERE isDeleted = 0 AND user_id = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
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


function Update_rest($pdo, $restId, $name, $address, $category, $menu_url) {
    $query = 'UPDATE restaurants SET name = :name, address = :address, category = :category, menu_url = :menu_url WHERE restaurant_id = :restId';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":restId", $restId, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":address", $address, PDO::PARAM_STR);
    $stmt->bindParam(":category", $category, PDO::PARAM_STR);

    $stmt->bindParam(":menu_url", $menu_url, PDO::PARAM_STR);

    $stmt->execute();
}


function read_company_rests($pdo, $userID) {
    $query = "SELECT * FROM users WHERE isDeleted = 0 AND role = 'rest' AND id = :userID";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}