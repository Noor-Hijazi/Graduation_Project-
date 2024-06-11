<?php
require_once 'db.inc.php';
require '../models/admin_dashboard_model.php';
require_once '../controller/admin_dashboard_contr.php';


 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guide_id = (int)$_POST['guid_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $experience = (int)$_POST['experience'];
    $language = trim($_POST['language']);
    $can_go = trim($_POST['can_go']);
    $rating = trim($_POST['rating']);

    try {
        update_guide_info($pdo, $guide_id, $name, $email, $experience, $language, $can_go,$rating);
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

