<?php
require_once '../../includes/db.inc.php';
require_once '../../models/carDetail_model.inc.php';

// Check if 'ID' parameter is provided in the URL
if (isset($_GET['ID'])) {
    $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslashes to get just the id 
    $carId = (int)$id; // Convert the ID to an integer for safe use

    // Function from model to get car details
    $result = get_car_detail($pdo, $carId);
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
    <title>Edit Car Details</title>
</head>
<style>

        form {
            width: 50%;
            margin: auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<body>
<div class="sidebar">
            <?php include 'car_dashboard.php';?>
        </div>
        <div class="content">
<?php if ($result): ?>
    <form method="post" action="../../includes/car_dashboard_edit.inc.php" enctype="multipart/form-data">
        <input type="hidden" name="carId" value="<?php echo htmlspecialchars($carId); ?>">

        <div class="slide">
            <?php
            echo '<img src="data:image/jpeg;base64,' . base64_encode($result['imagedata']) . '" alt="' . htmlspecialchars($result['main_image']) . '">';
            ?>
        </div>

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($result['name']); ?>" required>
        <br>
        <label for="brand">Brand:</label>
        <input type="text" name="brand" value="<?php echo htmlspecialchars($result['brand']); ?>" required>
        <br>
        <label for="transmission">Transmission:</label>
        <input type="text" name="transmission" value="<?php echo htmlspecialchars($result['transmision']); ?>">
        <br>
        <label for="fuel">Fuel:</label>
        <input type="text" name="fuel" value="<?php echo htmlspecialchars($result['fuel']); ?>">
        <br>
        <label for="kms_driven">Kms Driven:</label>
        <input type="text" name="kms_driven" value="<?php echo htmlspecialchars($result['kms_driven']); ?>">
        <br>
        <label for="rental_price">Rental Price:</label>
        <input type="text" name="rental_price" value="<?php echo htmlspecialchars($result['rental_price']); ?>">
        <br>
        <label for="model">Model Year:</label>
        <input type="text" name="model" value="<?php echo htmlspecialchars($result['model']); ?>">
        <br>
        <label for="number_of_car">Count:</label>
        <input type="text" name="number_of_car" value="<?php echo htmlspecialchars($result['number_of_car']); ?>">
        <br>
        <label for="seats">Seats:</label>
        <input type="text" name="seats" value="<?php echo htmlspecialchars($result['seats']); ?>">
        <br>
        <label for="color">Color:</label>
        <input type="text" name="color" value="<?php echo htmlspecialchars($result['color']); ?>">
        <br>
 
        <label for="main_image">Main Image:</label>
        <input type="file" name="main_image" >
       <br>
       <button type="submit">Save Changes</button>
    </form>
<?php else: ?>
    <p>No data found for the provided car ID.</p>
<?php endif; ?></div>
</body>
</html>
