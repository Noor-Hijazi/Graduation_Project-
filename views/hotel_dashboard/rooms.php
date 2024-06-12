<?php
session_start();
require '../../includes/db.inc.php';
require '../../models/hotel_dashboard_model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Room Details</title>
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
            max-width: 1200px;
            margin: auto;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            text-transform: uppercase;
            background-color: #00bbffcf;
            color: white;
            padding: 6px;
            font-size: 13px;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #ececec;
        }
        .button {
            padding: 4px 8px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            margin-top: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <?php include 'hotel_dashboad.php'; ?>
</div>
<div class="content">
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Room Type</th>
 
                    <th>Price per Night</th>
                    <th>Availability Status</th>
                    <th>Guest Name</th>
                    <th>Guest Email</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Total Price</th>
                    <th>Reservation Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $rooms = read_rooms_with_reservations($pdo); // Fetch all rooms with reservation details
                
                if ($rooms && count($rooms) > 0) {
                    foreach ($rooms as $room) {
                ?>
                        <tr>
                            <td><?= htmlspecialchars($room['room_type']) ?></td>

                            <td><?= htmlspecialchars($room['price_per_night']) ?> JOD</td>
                            <td><?= htmlspecialchars($room['availability_status']) ?></td>
                            <?php if ($room['reservation_id']) { ?>
                                <td><?= htmlspecialchars($room['guest_name']) ?></td>
                                <td><?= htmlspecialchars($room['guest_email']) ?></td>
                                <td><?= htmlspecialchars($room['check_in_date']) ?></td>
                                <td><?= htmlspecialchars($room['check_out_date']) ?></td>
                                <td><?= htmlspecialchars($room['total_price']) ?> JOD</td>
                                <td><?= htmlspecialchars($room['reservation_status']) ?></td>
                            <?php } else { ?>
                                <td colspan="6">No current reservation</td>
                            <?php } ?>
                            <td>
                                <form action="../../includes/hotel_delete_dashboard.inc.php" method="post">
                                    <input type="hidden" name="roomId" value="<?php echo htmlspecialchars($room['id']) ?>">
                                    <input type="submit" value="Delete" class="button" style="background-color: #555555;">
                                </form>
                                <form action="edit_room.php" method="post">
                                    <input type="hidden" name="roomId" value="<?php echo htmlspecialchars($room['id']) ?>">
                                    <input type="submit" value="Edit" class="button" style="background-color: #555555;">
                                </form>
                            </td>
                        </tr>
                <?php 
                    }
                } else { 
                ?>
                    <tr><td colspan="11">No Record Found for Rooms</td></tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
