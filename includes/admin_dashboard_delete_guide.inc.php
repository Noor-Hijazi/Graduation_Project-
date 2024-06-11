<?php
require_once 'db.inc.php';
require '../models/admin_dashboard_model.php';
require_once '../controller/admin_dashboard_contr.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if 'guid_id' is set in POST data

        $guide_id = (int)$_POST['guide_id'];
        try {
            delete_guide_info($pdo, $guide_id);
            echo '<script>
            alert("Deleted successfully");
            window.location.href = "../views/admin_dashboard/guides.php";
            </script>'; 

            // Close PDO connection
            $pdo = null;
            exit(); // Exit after successful update
        } catch (PDOException $e) {
            die("Query Failed from guides: " . $e->getMessage());
        }
    } else {
        // Redirect if 'guid_id' is not set
        header("Location: ../views/admin_dashboard/guides.php");
        exit();
    }


