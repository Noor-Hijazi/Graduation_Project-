<?php
// to prevent any wrong data type  to pass
declare(strict_types = 1 ); 

// to insert the image in table 

// Declare global variable to store carID
global $carID;

// Insert image into the database
function insert_into_car($pdo, $userID, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $imageData) {
    global $carID;
    $query="INSERT INTO car (userID, name, brand, transmision, fuel, seats, rental_price, model, main_image, imagedata) 
    VALUES (:userID, :name, :brand, :transmission, :fuel, :seats, :rental_price, :model, :main_image, :imagedata)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":userID", $userID);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":brand", $brand);
    $stmt->bindParam(":transmission", $transmission);
    $stmt->bindParam(":fuel", $fuel);
    $stmt->bindParam(":seats", $seats);
    $stmt->bindParam(":rental_price", $rental_price);
    $stmt->bindParam(":model", $model);
    $stmt->bindParam(":main_image", $fileName);
    $stmt->bindParam(':imagedata', $imageData, PDO::PARAM_LOB);
    
    $stmt->execute();
    $carID = (int)$pdo->lastInsertId();
}

function insert_into_cardetail($pdo,
    $fileName_one, $imageData_one,
    $fileName_two, $imageData_two,
    $fileName_three, $imageData_three,
    $color, $number, $kms_driven
) {
    global $carID;

    $query = "INSERT INTO car_detail (carID, image_one, image_data_one, image_two, image_data_two, image_three, image_data_three, color, number_of_car, kms_driven) 
              VALUES (:carID, :image_one, :image_data_one, :image_two, :image_data_two, :image_three, :image_data_three, :color, :number_of_car, :kms_driven)";
              
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":carID", $carID);
    $stmt->bindParam(":image_one", $fileName_one);
    $stmt->bindParam(":image_data_one", $imageData_one, PDO::PARAM_LOB);
    $stmt->bindParam(":image_two", $fileName_two);
    $stmt->bindParam(":image_data_two", $imageData_two, PDO::PARAM_LOB);
    $stmt->bindParam(":image_three", $fileName_three);
    $stmt->bindParam(":image_data_three", $imageData_three, PDO::PARAM_LOB);
    $stmt->bindParam(":color", $color);
    $stmt->bindParam(":number_of_car", $number);
    $stmt->bindParam(":kms_driven", $kms_driven);
    
    $stmt->execute();
}

//to delete a car 

function delete_a_car($pdo, $name) {
    $sql = "UPDATE car SET isDeleted = 1 WHERE LOWER(name) = LOWER(:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    try {
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function delete_a_car_by_ids($pdo, $carId) {
    $sql = "UPDATE car SET isDeleted = 1 WHERE  id= :carId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':carId', $carId);
    try {
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}




// funcation to read the car
function read_car(object $pdo, int $userID): array {
    $query = "
    SELECT c.*, cd.*
    FROM car AS c
    INNER JOIN car_detail AS cd ON c.id = cd.carID
    WHERE c.isDeleted = 0 AND c.userID = :userID;
    ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}






global $carID_2;

// Edit car function
function edit_car($pdo, $carId, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $imageData) {
    global $carID_2;
   $query = "UPDATE car SET 
                    name = :name,
                    brand = :brand,
                    transmision = :transmission,
                    fuel = :fuel,
                    rental_price = :rental_price,
                    model = :model,
                    main_image = :main_image,
                    seats = :seats,
                    imagedata = :imageData
                WHERE id = :carId";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":carId", $carId);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":brand", $brand);
    $stmt->bindParam(":transmission", $transmission);
    $stmt->bindParam(":fuel", $fuel);
    $stmt->bindParam(":seats", $seats);
    $stmt->bindParam(":rental_price", $rental_price);
    $stmt->bindParam(":model", $model);
    $stmt->bindParam(":main_image", $fileName);
    $stmt->bindParam(':imageData', $imageData, PDO::PARAM_LOB);
    
    $stmt->execute();
    $carID_2 = (int)$pdo->lastInsertId();
}

// Edit car detail function
function  edit_cardetail($pdo, $color, $number, $kms_driven) {
    global $carID_2;
 
    $query = "UPDATE car_detail SET 
                     color = :color,
                     number_of_car = :number_of_car,
                     kms_driven = :kms_driven WHERE carID = :carID";
     
     $stmt = $pdo->prepare($query);
     $stmt->bindParam(":carID", $carID_2);
     $stmt->bindParam(":color", $color);
     $stmt->bindParam(":number_of_car", $number);
     $stmt->bindParam(":kms_driven", $kms_driven);
 
     $stmt->execute();
 }
 



 //read user with car
 function read_company_cars($pdo, $userID) {
    $query = "SELECT * FROM users WHERE isDeleted = 0 AND role = 'car' AND id = :userID";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
