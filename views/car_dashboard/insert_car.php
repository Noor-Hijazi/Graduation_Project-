<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <link rel="stylesheet" type="text/css" href="../../css/nav_dashboard.css">
    <style>

        form {
            width: 50%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
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
        <?php include 'car_dashboard.php';?>
    </div>
    <div class="content">
    <div class="container">
        <form action="../../includes/car_dashboard_insert.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="userID" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">
        <label for="name">Name Of car</label>
            <input type="text" name="name" id="name" placeholder="Car Name">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" placeholder="Car Brand">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" placeholder="Car Model">
            <label for="transmission">Transmission</label>
            <input type="text" name="transmission" id="transmission" placeholder="Transmission Type">
            <label for="fuel">Fuel</label>
            <input type="text" name="fuel" id="fuel" placeholder="Fuel Type">
            <label for="seats">Number of seats</label>
            <input type="text" name="seats" id="seats" placeholder="Number of Seats">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" placeholder="Car Color">
            <label for="number">Numbers of cars do have</label>
            <input type="number" name="number" id="number" placeholder="Number of Cars">
            <label for="kms_driven">kms_driven</label>
            <input type="text" name="kms_driven" id="kms_driven" placeholder="Kilometers Driven">
            <label for="renal_price">price per day</label>
            <input type="text" name="renal_price" id="renal_price" placeholder="Rental Price per Day">
            <label for="image">Main Image To display</label>
            <input type="file" name="image" id="image" placeholder="Main Image">
            <label for="image_one">External image one</label>
            <input type="file" name="image_one" id="image_one" placeholder="External Image 1">
            <label for="image_two">External image two</label>
            <input type="file" name="image_two" id="image_two" placeholder="External Image 2">
            <label for="image_three">External image three</label>
            <input type="file" name="image_three" id="image_three" placeholder="External Image 3">
            <input type="submit" value="Add">

        </form>
    </div></div>
</body>
</html>
