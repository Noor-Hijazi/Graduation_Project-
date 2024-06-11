<?php

 
 if($_SERVER ["REQUEST_METHOD"] === "POST" ){

// start inputes for car table
$userId =  (int)$_POST['userId'];
try {
    require_once 'db.inc.php';
    require '../models/admin_dashboard_model.php';
    require_once '../controller/admin_dashboard_contr.php';
    require_once '../views/admin_dashboard/details_companies.php';

    read_car_view($pdo , $userId);

    $pdo =null ; 
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed from read services : " . $e->getMessage());
}

}
else{
    header("Location: ../views/admin_dashboard/companies.php");
    exit();
}