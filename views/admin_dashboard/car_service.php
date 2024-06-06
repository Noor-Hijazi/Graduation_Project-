<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_car'])) {
    $name= $_GET['search_car'];
    //from model
    $car_service = search_car_by_name($pdo, $name);

} else {
    $car_service = read_car_services( $pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Car Services</title>
</head>
<body>
    <div class="page">
        <div class="content"> 

        <form action="" method="GET">
            <input type="text" name="search_car" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>   

            <h3>HI <?php echo $_SESSION["user_username"]; ?></h3>
            <?php if ($car_service): ?>
                <?php foreach ($car_service as $result): ?>
                    <br><br>
                    <p>Name: <?php echo htmlspecialchars($result['name']); ?></p>
                    <p>Brand: <?php echo htmlspecialchars($result['brand']); ?></p>
                    <p>Transmission: <?php echo htmlspecialchars($result['transmision']); ?></p>
                    <p>Fuel: <?php echo htmlspecialchars($result['fuel']); ?></p>
                    <p>Seats: <?php echo htmlspecialchars($result['seats']); ?> seats</p>
                    <p>Rental Price per day: <?php echo htmlspecialchars($result['rental_price']); ?> JOD</p>
                    <p>Total cars from this one : <?php echo htmlspecialchars($result['number_of_car']); ?> cars</p>
                    <p>Rentaled  cars: <?php echo htmlspecialchars($result['update_number']); ?> cars</p>


                    <!-- Edit form -->
                    <form action="../../includes/admin_dashboard_remove_services.inc.php" method="POST">
                        <input type="hidden" name="carId" value="<?php echo $result['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>

                <?php endforeach; ?> 
            <?php else: ?>
              
            <?php endif; ?>

        </div>
    </div>
</body>
</html>
