<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];
$rest_reservtion = get_rest_reservtion($pdo, $userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($_SESSION["user_username"]) . " Dashboard"; ?></title>
    <link rel="stylesheet" type="text/css" href="../../css/users.css">
    <style>
        /* General Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Page Layout */
        .page {
            display: flex;
            width: 100%;
            min-height: 100vh;
            box-sizing: border-box;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            box-sizing: border-box;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            color: #ecf0f1;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
        }

        /* Content Area */
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #fff;
            margin-left: 250px;
            overflow-y: auto;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .content-inner {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
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

        /* Responsive Button Styling */
        button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .content {
                margin-left: 0;
                padding: 10px;
            }

            table, th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="sidebar">
        <?php include 'user_dashboard.php';?>
    </div>
    <div class="content">
        <div class="content-inner">
            <h4>Your Restaurant Reservations</h4>
            <?php if ($rest_reservtion): ?>
                <table>
                    <tr>
                        <th>Restaurant Name</th>
                        <th>Address</th>
                        <th>Reservation Date</th>
                        <th>Reservation Time</th>
                        <th>Number of People</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($rest_reservtion as $result): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($result['name']); ?></td>
                            <td><?php echo htmlspecialchars($result['address']); ?></td>
                            <td><?php echo htmlspecialchars($result['reservation_date']); ?></td>
                            <td><?php echo htmlspecialchars($result['reservation_time']); ?></td>
                            <td><?php echo htmlspecialchars($result['num_people']); ?></td>
                            <td>
                                <form action="../../includes/restaurant_reservation.inc.php" method="POST">
                                    <input type="hidden" name="reservationId" value="<?php echo htmlspecialchars($result['restaurant_id']); ?>">
                                    <button type="submit">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No restaurant reservations found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
