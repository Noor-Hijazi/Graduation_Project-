<?php
session_start();
require '../../includes/db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Room</title>
    <link rel="stylesheet" type="text/css" href="../../css/nav_dashboard.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .content {
            padding: 20px;
            background-color: #fff;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        select {
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
            align-self: center;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include 'hotel_dashboad.php'; ?>
    </div>
    <div class="content">
    
        <div class="container">
        <h1>Add Room</h1>
            <form action="../../includes/add_room.inc.php" method="post">
                <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">

                <label for="room_type">Room Type</label>
                <select name="room_type" id="room_type" required>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>

                <label for="price_per_night">Price per Night</label>
                <input type="number" step="0.01" name="price_per_night" id="price_per_night" placeholder="Price per Night" required>


                <input type="submit" value="Add Room">
            </form>
        </div>
    </div>
</body>
</html>
