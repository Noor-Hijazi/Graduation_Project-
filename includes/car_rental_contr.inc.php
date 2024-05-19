<?php
declare(strict_types=1);

// to handel the image
 function  create_rental($pdo,$carId ,$userId,$start_date,$end_date, $location_from ,$location_to,$fileName, $fileTmpName, $fileSize, $fileError, $fileType) {
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileActualExt = strtolower($fileExt);
    $allowed = array('jpg', 'jpeg', 'png','pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 600000) {
                $imageData = file_get_contents($fileTmpName);

                $result = get_car_info($pdo , $carId);
                $dailyRate = $result['rental_price'];    
                $totalPrice = calculate_total_price($dailyRate, $start_date, $end_date);
                echo "Total Price: $" . number_format($totalPrice, 2);

                insert_image($pdo,$carId,$userId,$start_date,$end_date, $location_from ,$location_to,$fileName, $imageData);

                $pdo = null;
                $stmt=null;
                exit();
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



// to calculate the totel price 
function calculate_total_price($dailyRate, $startDate, $endDate) {
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);
    $interval = $startDateTime->diff($endDateTime);
    $numberOfDays = $interval->days + 1; // Adding 1 to include the start day

    return $dailyRate * $numberOfDays;
}
