<?php

require_once 'includes/db.inc.php';
require_once 'models/admin_dashboard_model.php';
require_once 'controller/admin_dashboard_contr.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/statistics.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 
</head>
<body> 

    <div class="container">
        <div class="items">Tourists <br> <?php echo static_login( $pdo) ?></div>
        <div class="items">Cars<br> <?php echo static_car_company( $pdo) ?></div>
        <div class="items">Restuarants  <br> <?php echo static_rest_company( $pdo) ?></div>
        <div class="items">Hotels <br> <?php echo static_hotel_company( $pdo) ?></div>
        <div class="items">Guides <br> <?php echo static_guides_company( $pdo) ?></div>
    </div>
    
</body>
</html>