<?php

//to insert the car 
function insertion_into_car($pdo, $userID, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $fileTmpName, $fileSize, $fileError, $fileType) {
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileActualExt = strtolower($fileExt);
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 300000) {
                $imageData = file_get_contents($fileTmpName);
                insert_into_car($pdo, $userID, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $imageData);
                echo "<script>alert('Car with name \"$name\" added successfully.');window.location.href = '../includes/car_dashboard_insert.inc.php';</script>";
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was an error uploading your image!';
        }
    } else {
        echo "You cannot upload images of this type!";
    }
}





function insertion_into_cardetail
($pdo, $fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one  
,$fileName_two, $fileTmpName_two, $fileSize_two, $fileError_two, $fileType_two,
$fileName_three, $fileTmpName_three, $fileSize_three, $fileError_three, $fileType_three,$color,$number,$kms_driven

)

{
    $fileExt_one = pathinfo($fileName_one, PATHINFO_EXTENSION);
    $fileExt_two = pathinfo($fileName_one, PATHINFO_EXTENSION);
    $fileExt_three = pathinfo($fileName_one, PATHINFO_EXTENSION);

    $fileActualExt_one = strtolower($fileExt_one);
    $fileActualExt_two = strtolower($fileExt_two);
    $fileActualExt_three = strtolower($fileExt_three);
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt_one, $allowed) || in_array($fileActualExt_two, $allowed) || in_array($fileActualExt_three, $allowed)) {
        if ($fileError_one === 0 ||$fileError_two === 0  || $fileError_three === 0) {
            if ($fileSize_one < 300000) {
                $imageData_one = file_get_contents($fileTmpName_one);
                $imageData_two = file_get_contents($fileTmpName_two);
                $imageData_three = file_get_contents($fileTmpName_three);
                insert_into_cardetail
                
                ($pdo,
                    $fileName_one, $imageData_one,
                    $fileName_two, $imageData_two,
                    $fileName_three, $imageData_three,$color,$number,$kms_driven
                );
            
                
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was an error uploading your image!';
        }
    } else {
        echo "You cannot upload images of this type!";
    }

}


// Function to handle deletion of a car
function delete_car($pdo, $name) {
    $rowCount = delete_a_car($pdo, $name);
    if ($rowCount > 0) {
        echo "<script>alert('Car with name \"$name\" deleted successfully.');window.location.href = '../includes/car_dashboard_delete.inc.php';</script>";
    } else {
        echo "<script>alert('No car found with the name \"$name\".');window.location.href = '../includes/car_dashboard_delete.inc.php';</script>";
    }
}


 
//to Edit the car 
function edit_car_contr($pdo, $carId, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $fileTmpName, $fileSize, $fileError, $fileType) {
    $updateImage = false;
    $imageData = null;

    // Check if a file was uploaded
    if (!empty($fileName)) {
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 300000) { // 300KB size limit
                    $imageData = file_get_contents($fileTmpName);
                    $updateImage = true;
                } else {
                    echo 'Your file is too big!';
                    return;
                }
            } else {
                echo 'There was an error uploading your image!';
                return;
            }
        } else {
            echo 'You cannot upload images of this type!';
            return;
        }
    }

    // If no new image is provided, fetch the existing image data from the database
    if (!$updateImage) {
        $query = "SELECT main_image, imagedata FROM car WHERE id = :carId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
        $stmt->execute();
        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car) {
            $fileName = $car['main_image'];
            $imageData = $car['imagedata'];
        }
    }

    // Proceed with the update
    edit_car($pdo, $carId, $name, $brand, $transmission, $fuel, $seats, $rental_price, $model, $fileName, $imageData);

    // Display success message and redirect
    echo "<script>
        alert('Car with name \"$name\" updated successfully.');
        window.location.href = '../views/car_dashboard/edite_car.php?ID=$carId';
    </script>";
}






function edit_cardetail_contr($pdo,$color,$number,$kms_driven)
{
    edit_cardetail($pdo, $color, $number, $kms_driven);          
}