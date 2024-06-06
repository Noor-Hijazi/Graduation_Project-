<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/db.inc.php';

//get all inforntion from car table
function get_car_info(object $pdo , $carId){
    $query ="SELECT * FROM car WHERE id = :carId;";

   
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":carId" , $carId);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
    }


    
    // Insert rental into the database
    function insert_rental_car($pdo, $carId, $userId, $start_date, $end_date, $location_from, $location_to, $fileName, $imageData) {
        // Check if a transaction is already active, if not, start one
        if (!$pdo->inTransaction()) {
            $pdo->beginTransaction();
        }
    
        try {
            // Check if the car is available
            $availability_query = "SELECT available, number_of_car FROM car_detail WHERE carID = :carId";
            $availability_stmt = $pdo->prepare($availability_query);
            $availability_stmt->bindParam(":carId", $carId, PDO::PARAM_INT);
            $availability_stmt->execute();
            $availability_result = $availability_stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$availability_result || $availability_result['available'] == 0) {
                // Car is not available, rollback the transaction and throw an exception
                $pdo->rollBack();
                throw new Exception("The car is not available for rental.");
            }
    
            // Step 1: Insert rental information
            $query = "INSERT INTO car_rental (carID, userID, start_date, end_date, location_from, location_to, filename, image_data) 
                      VALUES (:carId, :userId, :start_date, :end_date, :location_from, :location_to, :fileName, :imageData)";
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
    
            // Step 2: Decrement the number_of_car in the car_detail table and increment the update number
            $update_query = "UPDATE car_detail 
                             SET available = CASE WHEN update_number > number_of_car THEN 0 ELSE available END,
                                 update_number = update_number + 1,
                                 status = 1
                             WHERE carID = :carId";
            $update_stmt = $pdo->prepare($update_query);
            $update_stmt->bindParam(":carId", $carId, PDO::PARAM_INT);
            $update_stmt->execute();
    
            // Commit the transaction
            $pdo->commit();
            echo "Rental successfully created.";

            //to check if the renal is done or not 
    
            // Get the current date
            $currentDate = date('Y-m-d');
    
            // Prepare the SQL query to update records
            $updateQuery = "UPDATE car_detail SET update_number = update_number - 1 
                            WHERE carID IN (SELECT carID FROM car_rental WHERE end_date < :currentDate)";
    
            // Execute the update query
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->bindParam(':currentDate', $currentDate);
            $updateStmt->execute();
    
            // Update the deleted field in the car_rental table
            $updateDeletedQuery = "UPDATE car_rental SET isDeleted = true WHERE end_date < :currentDate";
            $updateDeletedStmt = $pdo->prepare($updateDeletedQuery);
            $updateDeletedStmt->bindParam(':currentDate', $currentDate);
            $updateDeletedStmt->execute();
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            echo "Error: " . $e->getMessage();
        }
    }
    
 



    function remove_rental($pdo, $carId, $userId) {
        try {
            // Prepare the SQL query to update the rental record
            //dont foreget theupdate_number-1 from car_detail 
            $query = 'UPDATE car_rental SET isDeleted = true WHERE carID = :carId AND userID = :userId';
    
            // Prepare and execute the statement
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            echo "Rental successfully removed.";
        } catch (PDOException $e) {
            // Handle any errors
            echo "Error from remtal remove : " . $e->getMessage();
        }
    }
    