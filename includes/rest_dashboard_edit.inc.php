<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['restId'])) {
        $restId = $_POST['restId'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $category = $_POST['category'];
        $menu_url = $_POST['menu_url'];

        $file_one = $_FILES['image'];
        $fileName_one = $file_one['name'];
        $fileTmpName_one = $file_one['tmp_name'];
        $fileSize_one = $file_one['size'];
        $fileError_one = $file_one['error'];
        $fileType_one = $file_one['type'];

        try {
            require_once 'db.inc.php';
            require '../models/rest_dashboard_model.php';
            require_once '../controller/rest_dashboard_conter.php';

            Update_rest_contr($pdo, $restId, $name, $address, $category, $fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one, $menu_url);

        } catch (PDOException $e) {
            die("Query Failed from update rest: " . $e->getMessage());
        }

    } else {
        echo 'Something went wrong!';
    }
} else {
    header("Location: ../views/restaurant_dashboard/edit_rest.php");
    exit();
}