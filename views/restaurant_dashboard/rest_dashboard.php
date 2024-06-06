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
                <li><a href="#">Company Information </a></li>
                <li><a href="#">Restaurents</a></li>
                <li><a href="insert_rest.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">add new rest</a></li>
                <li><a href="delete_rest.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">delete a rest</a></li>
                <li><a href="read_rests.php?user_id=<?php echo htmlspecialchars( $_SESSION["user_id"]); ?>">reads rest</a></li>
            </ul>
        </div>
        <div class="content">
            <h3>ABOUT</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est nihil laborum temporibus eius rerum nisi. In a incidunt maxime molestiae consequuntur? Quia corporis similique atque, veritatis ullam excepturi obcaecati ipsa.</p>
            <h3>HI I"M NOOR</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officiis laborum aperiam sed aut cumque ipsum quos exercitationem magnam quidem non cum et atque, illum quas tempore eius veritatis error.</p>
            <br><br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad placeat perferendis reiciendis fugiat aliquam possimus ipsum laborum, nisi saepe voluptatibus sit eius quisquam optio ea voluptas aspernatur? Saepe, beatae dicta!</p>
        </div>
    </div>
</body>
</html>