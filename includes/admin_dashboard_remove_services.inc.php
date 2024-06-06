<?php
require_once 'db.inc.php';
require_once '../models/admin_dashboard_model.php';
require_once '../controller/admin_dashboard_contr.php';
require_once '../views/admin_dashboard/details_companies.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['carId'])) {
    $carId = (int)$_POST['carId'];
    try {
        if (remove_car($pdo, $carId)) {
            echo '<script>
            alert("Delete successfully");
            window.location.href = "../views/admin_dashboard/services.php";
        </script>';
        } else {
            echo '<script>
            alert("Delete is not successful");
            window.location.href = "../views/admin_dashboard/services.php";
        </script>';
        }
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed from delete services : " . $e->getMessage());
    }


} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['restaurant_id'])) {
    $restaurant_id = (int)$_POST['restaurant_id'];
    try {
        if (remove_rest($pdo, $restaurant_id)) {
            echo '<script>
            alert("Delete is successfully");
            window.location.href = "../views/admin_dashboard/services.php";
        </script>';
        } else {
            echo '<script>
            alert("Delete is  successful");
            window.location.href = "../views/admin_dashboard/services.php";
        </script>';
        }
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed from delete services : " . $e->getMessage());
    }
} else {
    header("Location: ../views/admin_dashboard/services.php");
    exit();
}

