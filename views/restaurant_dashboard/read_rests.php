<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../rest_veiw.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read Restaurant Details</title>
</head>
<body>
    <?php
    if (isset($_SESSION["user_id"])) {
        $userID = $_SESSION["user_id"];
        display_read_rests($pdo, $userID);
    } else {
        echo "User ID is not set in session.";
    }
    ?>
</body>
</html>
