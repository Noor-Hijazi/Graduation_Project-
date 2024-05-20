<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/car_rental_model.inc.php';

require_once __DIR__ . '/../includes/db.inc.php';




function display_car_info(object $pdo ,  $carId){
    $result= get_car_info( $pdo ,  $carId);

    echo '
        <label for="name">name</label>
        <input type="text" name="name" id="name" placeholder="name" value = '.$result['name'].'>

        <label for="fuel">Fuel</label>
        <input type="text" name="fuel" id="fuel" placeholder="fuel"value = '.$result['fuel'].'>


        <label for="seats">Seats</label>
        <input type="text" name="seats" id="seats" placeholder="seats"value = '.$result['seats'].'>

        <label for="rental_price">Rental Price Per Day</label>
        <input type="text" name="rental_price" id="rental_price" placeholder="rental_price"value = '.$result['rental_price'].'>
        
        <label for="model">Model</label>
        <input type="text" name="model" id="model" placeholder="model"value = '.$result['model'].'>
    ';

}
