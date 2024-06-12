

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['restId'])) {
        $restId = $_POST['restId'];



        try {
            require_once 'db.inc.php';
            require '../models/rest_dashboard_model.php';
            require_once '../controller/rest_dashboard_conter.php';

            // Update_rest_contr($pdo, $restId, $name, $address, $category, $fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one, $menu_url);
            delete_a_rest_by_ides($pdo, $restId) ;
            echo "<script>alert('Restaurant deleted successfully.');window.location.href = '../views/restaurant_dashboard/read_rests.php';</script>";

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