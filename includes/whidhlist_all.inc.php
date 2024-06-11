<?php
declare(strict_types=1);
session_start();
    $userId =  $_SESSION["user_id"];

    try {
        require_once 'db.inc.php';
        require '../models/wishlist_model.inc.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // if add one car 
            if (isset($_POST['add'])&& isset($_POST['car_id'])) {
                $carId = $_POST['car_id'];
             
                add_into_wishlist_cars($pdo, $userId, (int)$carId);
                header("Location: ../all_cars.php");
                die();

            } 
            //if remove one 
            elseif (isset($_POST['remove'])&& isset($_POST['car_id'])) { 
                $carId = $_POST['car_id'];
             
                delete_car_wishlist($pdo, $userId, (int)$carId);
                header("Location: ../wishlist_user.php");
                die();
             }


             // for guide
             elseif(isset($_POST['add'])&& isset($_POST['guid_id'])){
                $guid_id = $_POST['guid_id'];
             
                add_into_wishlist_guides($pdo, $userId, (int)$guid_id);
                header("Location: ../all_guids.php");
                die();
             }
        

             elseif (isset($_POST['remove'])&& isset($_POST['guid_id'])) { 
                $guidId = $_POST['guid_id'];
             
                delete_guide_wishlist ( $pdo  , $userId , (int) $guidId);
                header("Location: ../wishlist_user.php");
                die();
             }   
        
             //for hotel 
             elseif(isset($_POST['add'])&& isset($_POST['hotel_id'])){
                $hotel_id = $_POST['hotel_id'];
             
                add_into_wishlist_hotel($pdo, $userId, (int)$hotel_id);
                header("Location: ../all_hotels.php");
                die();
             }    
             elseif (isset($_POST['remove'])&& isset($_POST['hotel_id'])) { 
                $hotel_id = $_POST['hotel_id'];
             
                delete_hotel_wishlist  ( $pdo  , $userId , (int) $hotel_id);
                header("Location: ../wishlist_user.php");
                die();
             }  



             
             elseif (isset($_POST['remove'])&& isset($_POST['restaurant_id'])) { 
                $restaurant_id = $_POST['restaurant_id'];
             
                delete_rest_wishlist ( $pdo  , $userId , (int) $restaurant_id);
                header("Location: ../wishlist_user.php");
                die();
             }  
             
             //for rest
             elseif(isset($_POST['add'])&& isset($_POST['restaurant_id'])){
                $restaurant_id = $_POST['restaurant_id'];
             
                add_into_wishlist_rest($pdo, $userId, (int)$restaurant_id);
                header("Location: ../all_restaurant.php");
                die();
             }    
             
            

        }else {
            // If not submitted as POST method, redirect to the index page
                header("Location: ../wishlist_user.php"); 
            exit();
        
       
        
       
    } }catch (PDOException $e) {
        die("Query Failed from wishlist: " . $e->getMessage());
    }


