<?php

declare(strict_types=1);
require_once '../../includes/db.inc.php';
require '../../models/rest_dashboard_model.php';

if (isset($_GET['ID'])) {
    $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslashes to get just the id 
    $restId = (int)$id;
    $result = get_rest_detail($pdo, $restId);
  
} else {
    echo '<p>No ID provided.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant</title>
    <link rel="stylesheet" type="text/css" href="../../css/nav_dashboard.css">
    
</head>
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
            max-width: 500px;
            width: 100%;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            margin-top: 10px;
            margin-bottom: 5px;
            color: #555;
            display: block;
        }

        .form-container input[type="text"],
        .form-container input[type="file"],
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 15px;
        }
    </style>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'rest_dashboard.php'; ?>
        </div>
   <div class="content">
    <div class="form-container">
        <?php if ($result) { ?>
            <h1>Edit Restaurant Information</h1>
            <form action="../../includes/rest_dashboard_edit.inc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="restId" value="<?php echo $restId; ?>">
               
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($result['name']); ?>">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($result['address']); ?>">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($result['category']); ?>">
                <label for="menu_url">Menu URL:</label>
                <input type="text" id="menu_url" name="menu_url" value="<?php echo htmlspecialchars($result['menu_url']); ?>">
               

                <button type="submit">Update</button>
            </form>  
        <?php } else {
            echo '<p>Cannot read the restaurant details!</p>';
        } ?>
    </div> </div></div>
</body>
</html>
