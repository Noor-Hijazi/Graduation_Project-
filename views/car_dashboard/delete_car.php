<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Car</title>
    <link rel="stylesheet" type="text/css" href="../../css/nav_dashboard.css">

    <style>


        form {
            width: 50%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 50%;
            padding: 12px 20px;
            background-color: #555555;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <?php include 'car_dashboard.php';?>
    </div>
    <div class="content">
        <div class="container">
        <form action="../../includes/car_dashboard_delete.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">
            <label for="name">Name Of car</label>
            <input type="text" name="name" id="name" placeholder="Delete By Name">
            <input type="submit" value="Remove">
        </form>
    </div></div>
</body>
</html>
