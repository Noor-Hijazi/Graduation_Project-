<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Restaurant</title>
     <link rel="stylesheet" type="text/css" href="../../css/nav_dashboard.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            margin-bottom: 5px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

   
    </style>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'rest_dashboard.php';?>
        </div>
    </div>
    <div class="content">
    <div class="form-container">
        <h2>Delete Restaurant</h2>
        <form action="../../includes/rest_dashboard_delete.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">

            <label for="name">Name of Restaurant</label>
            <input type="text" name="name" id="name" required>

            <input type="submit" value="Delete">
        </form>
    </div></div>
</body>
</html>
