<?php
declare(strict_types=1);
session_start();
    $userId =  $_SESSION["user_id"];

    try {
        require_once 'db.inc.php';
        require '../models/wishlist_model.inc.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // if add one
            if (isset($_POST['add'])) {
                $carId = $_POST['car_id'];
                add_into_wishlist($pdo, $userId, (int)$carId);
                header("Location: ../cars.php");
                die();

            } 
            //if remove one 
            elseif (isset($_POST['remove'])) { 
                $carId = $_POST['car_id'];
                delete_car_wishlist($pdo, $userId, (int)$carId);
                header("Location: ../wishlist_user.php");
                die();
             }
        }else {
            // If not submitted as POST method, redirect to the index page
                header("Location: ../wishlist_user.php"); 
            exit();
        
       
        
       
    } }catch (PDOException $e) {
        die("Query Failed from wishlist: " . $e->getMessage());
    }


