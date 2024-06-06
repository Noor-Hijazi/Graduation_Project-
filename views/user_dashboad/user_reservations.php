<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];

$car_rentals = get_rental_car($pdo, $userId);
$rest_reservtion = get_rest_reservtion($pdo, $userId);
$trip_reservtion = get_trip_reservtion($pdo, $userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($_SESSION["user_username"]) . " Dashboard"; ?></title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
<div class="page">
    <div class="content">
        <h3>HI <?php echo htmlspecialchars($_SESSION["user_username"]); ?></h3>
        <br><br>
        
        <?php if ($car_rentals): ?>
            <?php foreach ($car_rentals as $result): ?>
                <p>Car name: <?php echo htmlspecialchars($result['name']); ?></p>
                <p>Brand: <?php echo htmlspecialchars($result['brand']); ?></p>
                <p>Price per day: <?php echo htmlspecialchars($result['rental_price']); ?></p>
                <p>Rented at: <?php echo htmlspecialchars($result['created_at']); ?></p>
                <p>Rental Start Date: <?php echo htmlspecialchars($result['start_date']); ?></p>
                <p>Rental End Date: <?php echo htmlspecialchars($result['end_date']); ?></p>
                <p>Location from: <?php echo htmlspecialchars($result['location_from']); ?></p>
                <p>Location to: <?php echo htmlspecialchars($result['location_to']); ?></p>
                <div class="car-rental">
                    <form action="../../includes/car_rental.inc.php" method="POST">
                        <input type="hidden" name="carId" value="<?php echo htmlspecialchars($result['carID']); ?>">
                        <button type="submit">Cancel</button>
                    </form>
                </div>
                <br>
            <?php endforeach; ?>
        <?php else: ?>

        <?php endif; ?>

        <?php if ($rest_reservtion): ?>
            <?php foreach ($rest_reservtion as $result): ?>
                <p>Restaurant name: <?php echo htmlspecialchars($result['name']); ?></p>
                <p>Address: <?php echo htmlspecialchars($result['address']); ?></p>
                <p>Reservation date: <?php echo htmlspecialchars($result['reservation_date']); ?></p>
                <p>Reservation time: <?php echo htmlspecialchars($result['reservation_time']); ?></p>
                <p>Number of people: <?php echo htmlspecialchars($result['num_people']); ?></p>
                <div class="restaurant-reservation">
                    <form action="../../includes/restaurant_reservation.inc.php" method="POST">
                        <input type="hidden" name="reservationId" value="<?php echo htmlspecialchars($result['restaurant_id']); ?>">
                        <button type="submit">Cancel</button>
                    </form>
                </div>
                <br>
            <?php endforeach; ?>
        <?php else: ?>
     
        <?php endif; ?>

        <?php if ($trip_reservtion): ?>
            <?php foreach ($trip_reservtion as $result): ?>
                <p>guide name: <?php echo htmlspecialchars($result['guid_name']); ?></p>
                <p>email: <?php echo htmlspecialchars($result['email']); ?></p>
                <p>languages: <?php echo htmlspecialchars($result['languages']); ?></p>
                <p>meetup: <?php echo htmlspecialchars($result['meetup']); ?></p>
                <p>Your Notes: <?php echo htmlspecialchars($result['notes']); ?></p>
                <p>Expected to go: <?php echo htmlspecialchars($result['can_go']); ?></p>
                <div class="restaurant-reservation">
                    <form action="../../includes/restaurant_reservation.inc.php" method="POST">
                        <input type="hidden" name="guid_id" value="<?php echo htmlspecialchars($result['guid_id']); ?>">
                        <button type="submit">Cancel</button>
                    </form>
                </div>
                <br>
            <?php endforeach; ?>
        <?php else: ?>
     
        <?php endif; ?>
    </div>
</div>
</body>
</html>
