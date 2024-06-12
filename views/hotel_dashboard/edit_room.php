<?php


require '../../includes/db.inc.php'; // Include database connection
include '../../models/hotel_dashboard_model.php'; // Include the model with room_info function

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $roomId = $_POST['roomId'];
        $room = room_info($pdo, $roomId);
  
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
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
            /* background-color: #45a049; */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include 'hotel_dashboad.php'; ?>
    </div>
    <div class="content">
        <div class="container">
            <h1>Edit Room</h1>
            <?php if ($room) { ?>
            <form action="../../includes/hotel_edit_dashboard.inc.php" method="post">
                <input type="hidden" name="roomId" value="<?php echo htmlspecialchars($room['id']); ?>">

                <label for="room_type">Room Type</label>
                <select name="room_type" id="room_type" required>
                    <option value="single" <?php if ($room['room_type'] == 'single') echo 'selected'; ?>>Single</option>
                    <option value="double" <?php if ($room['room_type'] == 'double') echo 'selected'; ?>>Double</option>
                    <option value="suite" <?php if ($room['room_type'] == 'suite') echo 'selected'; ?>>Suite</option>
                </select>

                <label for="price_per_night">Price per Night</label>
                <input type="number" step="0.01" name="price_per_night" id="price_per_night" value="<?php echo htmlspecialchars($room['price_per_night']); ?>" required>

                <label for="availability_status">Availability Status</label>
                <select name="availability_status" id="availability_status" required>
                    <option value="available" <?php if ($room['availability_status'] == 'available') echo 'selected'; ?>>Available</option>
                    <option value="booked" <?php if ($room['availability_status'] == 'booked') echo 'selected'; ?>>Booked</option>
                </select>

                <input type="submit" value="Update Room">
            </form>
            <?php } else { ?>
                <p>No room information found or session user ID not set.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<?php } ?>
