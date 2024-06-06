<?php

 
 if($_SERVER ["REQUEST_METHOD"] === "POST" ){

// start inputes for car table
$userId =  (int)$_POST['userId'];
try {
    require_once 'db.inc.php';
    require '../models/admin_dashboard_model.php';
    require_once '../controller/admin_dashboard_contr.php';
    require_once '../views/admin_dashboard/details_companies.php';

    if (undo_company($pdo, $userId)) {
        echo '<script>
        alert("Undo successfully");
        window.location.href = "../views/admin_dashboard/trash_bin_admin_dashboard.php";
    </script>';   
 } else {
        echo '<script>
        alert("Failed undo");
        window.location.href = "../views/admin_dashboard/trash_bin_admin_dashboard.php";
    </script>'; 
    }

    $pdo =null ; 
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query Failed from delete services : " . $e->getMessage());
}

}
else{
    header("Location: ../views/admin_dashboard/companies.php");
    exit();
}