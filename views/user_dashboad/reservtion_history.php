<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];

$car_rental_deleted =  get_rental_car_deleted($pdo,$userId);
$rest_reservtion_deleted =  get_rest_reservtion_deleted($pdo,$userId);
$trip_reservtion_deleted =  get_trip_reservtion_deleted($pdo,$userId);
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
            <?php if ($car_rental_deleted ): ?>
                <?php foreach ($car_rental_deleted  as $result): ?>
                    <br>
                    <p>Brand: <?php echo htmlspecialchars($result['brand']); ?></p>
                    <p>Was Rental at: <?php echo htmlspecialchars($result['created_at']); ?></p>
                    <p>Rental Start Date: <?php echo htmlspecialchars($result['start_date']); ?></p>
                    <p>Rental End Date: <?php echo htmlspecialchars($result['end_date']); ?></p>
                    <div class="car-rental">
                        <?php if (isset($result['imagedata']) && isset($result['main_image'])): ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($result['imagedata']); ?>" alt="<?php echo htmlspecialchars($result['main_image']); ?>">

                        <?php else: ?>
                            <p>No image available for this rental.</p>
                        <?php endif; ?>
                    </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No rentals found for this user.</p>
            <?php endif; ?>


            <?php if ($rest_reservtion_deleted ): ?>
                <?php foreach ($rest_reservtion_deleted  as $result): ?>
                    <br>
                    <p>Restaurant name: <?php echo htmlspecialchars($result['name']); ?></p>
                    <p>Address: <?php echo htmlspecialchars($result['address']); ?></p>
                    <p>Reservation date: <?php echo htmlspecialchars($result['reservation_date']); ?></p>
                    <p>Reservation time: <?php echo htmlspecialchars($result['reservation_time']); ?></p>
                    <p>Number of people: <?php echo htmlspecialchars($result['num_people']); ?></p>
                    </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No rentals found for this user.</p>
            <?php endif; ?>

            <?php if ($trip_reservtion_deleted ): ?>
                <?php foreach ($trip_reservtion_deleted  as $result): ?>
                    <br>
                    <p>guide name: <?php echo htmlspecialchars($result['guid_name']); ?></p>
                    <p>email: <?php echo htmlspecialchars($result['email']); ?></p>
                    <p>languages: <?php echo htmlspecialchars($result['languages']); ?></p>
                    <p>meetup: <?php echo htmlspecialchars($result['meetup']); ?></p>
                    <p>Your Notes: <?php echo htmlspecialchars($result['notes']); ?></p>
                    <p>Expected to go: <?php echo htmlspecialchars($result['can_go']); ?></p>
                    </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No rentals found for this user.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
