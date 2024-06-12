<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];

$car_rental_deleted = get_rental_car_deleted($pdo, $userId);
$rest_reservtion_deleted = get_rest_reservtion_deleted($pdo, $userId);
$trip_reservtion_deleted = get_trip_reservtion_deleted($pdo, $userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($_SESSION["user_username"]) . " Dashboard"; ?></title>
    <link rel="stylesheet" type="text/css" href="../../css/users.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        img {
            display: block;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="sidebar">
        <?php include 'user_dashboard.php';?>
    </div>
    <div class="content">
        <h4>Deleted Car Rentals</h4>
        <?php if ($car_rental_deleted): ?>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Was Rental at</th>
                    <th>Rental Start Date</th>
                    <th>Rental End Date</th>
                </tr>
                <?php foreach ($car_rental_deleted as $result): ?>
                    <tr>
                        <td>
                            <?php if (isset($result['imagedata']) && isset($result['main_image'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($result['imagedata']); ?>" alt="<?php echo htmlspecialchars($result['main_image']); ?>">
                            <?php else: ?>
                                <p>No image available for this rental.</p>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($result['brand']); ?></td>
                        <td><?php echo htmlspecialchars($result['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($result['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($result['end_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No deleted car rentals found.</p>
        <?php endif; ?>

        <h4>Deleted Restaurant Reservations</h4>
        <?php if ($rest_reservtion_deleted): ?>
            <table>
                <tr>
                    <th>Restaurant Name</th>
                    <th>Address</th>
                    <th>Reservation Date</th>
                    <th>Reservation Time</th>
                    <th>Number of People</th>
                </tr>
                <?php foreach ($rest_reservtion_deleted as $result): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['name']); ?></td>
                        <td><?php echo htmlspecialchars($result['address']); ?></td>
                        <td><?php echo htmlspecialchars($result['reservation_date']); ?></td>
                        <td><?php echo htmlspecialchars($result['reservation_time']); ?></td>
                        <td><?php echo htmlspecialchars($result['num_people']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No deleted restaurant reservations found.</p>
        <?php endif; ?>

        <h4>Deleted Trip Reservations</h4>
        <?php if ($trip_reservtion_deleted): ?>
            <table>
                <tr>
                    <th>Guide Name</th>
                    <th>Email</th>
                    <th>Languages</th>
                    <th>Meetup</th>
                    <th>Your Notes</th>
                    <th>Expected to Go</th>
                </tr>
                <?php foreach ($trip_reservtion_deleted as $result): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['guid_name']); ?></td>
                        <td><?php echo htmlspecialchars($result['email']); ?></td>
                        <td><?php echo htmlspecialchars($result['languages']); ?></td>
                        <td><?php echo htmlspecialchars($result['meetup']); ?></td>
                        <td><?php echo htmlspecialchars($result['notes']); ?></td>
                        <td><?php echo htmlspecialchars($result['can_go']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No deleted trip reservations found.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
