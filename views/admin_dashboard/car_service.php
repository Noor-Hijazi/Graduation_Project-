<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_car'])) {
    $name = $_GET['search_car'];
    //from model
    $car_service = search_car_by_name($pdo, $name);
} else {
    $car_service = read_car_services($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Car Services</title>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'admin_dashboard.php'; ?>
        </div>
        <div class="content"> 
            <div class="continer">
            <form action="" method="GET" class="search_form">
                <input type="text" name="search_car" placeholder="Search by name">
                <button type="submit">Search</button>
            </form>   

            <?php if ($car_service): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Transmission</th>
                            <th>Fuel</th>
                            <th>Seats</th>
                            <th>Rental Price per day</th>
                            <th>Total cars</th>
                            <th>Rentaled cars</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($car_service as $result): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($result['name']); ?></td>
                                <td><?php echo htmlspecialchars($result['brand']); ?></td>
                                <td><?php echo htmlspecialchars($result['transmision']); ?></td>
                                <td><?php echo htmlspecialchars($result['fuel']); ?></td>
                                <td><?php echo htmlspecialchars($result['seats']); ?> seats</td>
                                <td><?php echo htmlspecialchars($result['rental_price']); ?> JOD</td>
                                <td><?php echo htmlspecialchars($result['number_of_car']); ?> cars</td>
                                <td><?php echo htmlspecialchars($result['update_number']); ?> cars</td>
                                <td>
                                    <form action="../../includes/admin_dashboard_remove_services.inc.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="carId" value="<?php echo $result['id']; ?>">
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            <?php else: ?>
                <p>No Car Services.</p>
            <?php endif; ?>
        </div>
    </div></div>
</body>
</html>
