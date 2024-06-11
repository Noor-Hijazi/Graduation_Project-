<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];
$car_rentals = get_rental_car($pdo, $userId);
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
            overflow: hidden; /* Prevent body from scrolling */
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
            overflow-y: auto; /* Allow sidebar to scroll if content overflows */
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
            flex-grow: 1; /* Ensures content takes up remaining space */
            padding: 20px;
            background-color: #fff;
            margin-left: 250px; /* Ensure content is beside the sidebar */
            overflow-y: auto; /* Allow content to scroll if it overflows */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .content-inner {
            flex-grow: 1; /* Ensures inner content takes up all available space */
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
            padding: 12px; /* Increase padding for better readability */
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
        img {
            display: block;
            max-width: 100px;
            height: auto;
            border-radius: 8px; /* Rounded corners for images */
        }
        /* Responsive Button Styling */
        button {
            padding: 8px 12px; /* Increased padding for buttons */
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
            <h4>Your Car Rentals</h4>
            <?php if ($car_rentals): ?>
                <table>
                    <tr>
                        <th>Car Name</th>
                        <th>Brand</th>
                        <th>Price per Day (JOD)</th>
                        <th>Rented at</th>
                        <th>Rental Start Date</th>
                        <th>Rental End Date</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Total Price (JOD)</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($car_rentals as $result): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($result['name']); ?></td>
                            <td><?php echo htmlspecialchars($result['brand']); ?></td>
                            <td><?php echo htmlspecialchars($result['rental_price']); ?></td>
                            <td><?php echo htmlspecialchars($result['created_at']); ?></td>
                            <td><?php echo htmlspecialchars($result['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($result['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($result['location_from']); ?></td>
                            <td><?php echo htmlspecialchars($result['location_to']); ?></td>
                            <td><?php echo htmlspecialchars($result['totalPrice']); ?> JOD</td>
                            <td>
                                <form action="../../includes/car_rental.inc.php" method="POST">
                                    <input type="hidden" name="carId" value="<?php echo htmlspecialchars($result['carID']); ?>">
                                    <button type="submit">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No car rentals found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
