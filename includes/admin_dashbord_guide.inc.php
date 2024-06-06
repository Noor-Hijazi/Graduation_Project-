<?php
require_once 'db.inc.php';
require '../models/admin_dashboard_model.php';
require_once '../controller/admin_dashboard_contr.php';


 if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // If 'guid_id' is not set but other fields are set, update guide information
        $guide_id = (int)$_POST['guide_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $experience = $_POST['experience'];
        $language = $_POST['language'];
        $can_go = $_POST['can_go'];

        try {
            update_guide_info($pdo, $guide_id, $name, $email, $experience, $language, $can_go);
            echo '<script>
            alert("Updated successfully");
            window.location.href = "../views/admin_dashboard/guides.php";
            </script>'; 

            // Close PDO connection
            $pdo = null;
            exit(); // Exit after successful update
        } catch (PDOException $e) {
            die("Query Failed from guides: " . $e->getMessage());
        }
    }
else {
    // Redirect if the request method is not POST
    header("Location: ../views/admin_dashboard/guides.php");
    exit();
}

