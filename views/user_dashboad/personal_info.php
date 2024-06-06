<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];

$result = get_info_user($pdo, $userId);
$car_rentals = get_rental_car($pdo, $userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["user_username"] . " Dashboard"; ?></title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
    <div class="page">
        <div class="content">
            <?php if ($result) { ?>
                <h3>HI <?php echo htmlspecialchars($result['username']); ?></h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officiis laborum aperiam sed aut cumque ipsum quos exercitationem magnam quidem non cum et atque, illum quas tempore eius veritatis error.</p>
                <br><br>
                <p>Email: <?php echo htmlspecialchars($result['email']); ?></p>
                <p>Joined at: <?php echo htmlspecialchars($result['created_at']); ?></p>
            <?php } ?>

            <?php if ($car_rentals) { 
                foreach ($car_rentals as $car_rental) { ?>
                    <div class="car-rental">
                        <?php if (isset($car_rental['image_data']) && isset($car_rental['filename'])) { ?>
                            <p>Driver License</p>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($car_rental['image_data']); ?>" alt="<?php echo htmlspecialchars($car_rental['filename']); ?>">
                        <?php } else { ?>
                            <p>No image available for this car.</p>
                        <?php } ?>
                    </div>
                <?php } 
            } ?>
        </div>
    </div>
</body>
</html>
