<?php
 declare(strict_types = 1 );


 function get_car_detail(object $pdo , $carId){
     // the sql query we want it
     $sql = "SELECT d.*, c.*
     FROM car_detail AS d
     JOIN car AS c ON d.carID = c.id
     WHERE c.id = ?;";


    $stmt = $pdo->prepare($sql);
    // send the id when it excute it
    $stmt->execute([$carId]);

    // Fetch the query result as an  array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
 }