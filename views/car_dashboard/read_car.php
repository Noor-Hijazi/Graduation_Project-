<?php
session_start();
require '../../includes/db.inc.php';
require '../../models/car_dashboard_model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read CAR Details</title>
</head>
<body>
<div class="sidebar">
    <?php include 'car_dashboard.php';?>
</div>
<div class="content">
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Transmission</th>
                    <th>Fuel</th>
                    <th>Price per day</th>
                    <th>Number of cars</th>
                    <th>Rented cars</th>
                    <th>Rented</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($_SESSION["user_id"])) {
                    $userID = $_SESSION["user_id"];
                    $result = read_car($pdo, $userID);
                    
                    if ($result && count($result) > 0) {
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['brand']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['transmision']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['fuel']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['rental_price']) . ' JOD</td>';
                            echo '<td>' . htmlspecialchars($row['number_of_car']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['update_number']) . '</td>';
                            echo '<td>' . ($row['status'] == 1 ? 'Yes' : 'No') . '</td>';
                            echo '<td>';
                            echo '<a class="button" href="details_car_dashboard.php?ID=' . htmlspecialchars($row['id']) . '" style = " background-color: #555555;">Details</a>';
                            echo '<a class="button" href="edite_car.php?ID=' . htmlspecialchars($row['id']) . '"style = " background-color: #555555;">Edit</a>';
                            echo'<form action="../../includes/car_delete_by_id.inc.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="carId" id="carId" value =' . htmlspecialchars($row['id']) .'>
                                    <input type="submit" value="Delete" class="button" style = " background-color: #555555;">
                                </form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="9">No Record Found in Car</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="9">User ID is not set in session.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
