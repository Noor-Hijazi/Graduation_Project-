<?php
session_start();

// Ensure the user is logged in and the session contains the user_id
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in (e.g., redirect to login page)
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Restaurant</title>
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
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="page">
        <div class="sidebar">
            <?php include 'rest_dashboard.php';?>
        </div>
        <div class="content">
    <div class="form-container">
        <h2>Add New Restaurant</h2>
        <form action="../../includes/rest_dashboard_insert.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">

            <label for="name">Name Of Restaurant</label>
            <input type="text" name="name" id="name" required>

            <label for="address">Address</label>
            <input type="text" name="address" id="address" required>

            <label for="category">Category Of Restaurant</label>
            <input type="text" name="category" id="category" required>

            <label for="image">Main Image To Display</label>
            <input type="file" name="image" id="image" required>

            <label for="menu_url">Menu Image URL</label>
            <input type="text" name="menu_url" id="menu_url" required>

            <input type="submit" value="Add">
        </form>
    </div></div></div>
</body>
</html>
