<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["user_username"]. " Dashboard"?></title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <ul>
                <li>Dashboard</li>
                <li><a href="personal_info.php">Personal Information </a></li>
                <li><a href="#">Restaurents</a></li>
                <li><a href="user_reservations.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">reservations.</a></li>
                <li><a href="reservtion_history.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">History</a></li>
                <li><a href="read_rests.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">reads rest</a></li>
                <li><a href="../../wishlist_user.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">favarit</a></li>
            </ul>
        </div>
        <div class="content">

    </div>
</body>
</html>

