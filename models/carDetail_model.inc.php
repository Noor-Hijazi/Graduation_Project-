<?php
 declare(strict_types = 1 );


 function get_car_detail(object $pdo, $carId) {
    // The SQL query with a positional placeholder
    $sql = "SELECT d.*, c.*
            FROM car_detail AS d
            JOIN car AS c ON d.carID = c.id
            WHERE c.id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$carId]);

    // Fetch the query result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
