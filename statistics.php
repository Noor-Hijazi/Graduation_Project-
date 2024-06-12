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
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 
</head>
<style>
    .container{
        display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    padding-top: 100px;
    padding-bottom: 100px;
    }

    .items {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    width: 200px;
    height: 100px;
    align-content: center;
    border: .5px solid lightgray;
}

@media (max-width:768px) {
  .container{
    flex-wrap: wrap;
  }
}

</style>

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