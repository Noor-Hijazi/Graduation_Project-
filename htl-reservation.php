<?php
include("nav.php");


require 'includes/db.inc.php';
$userId = $_SESSION['user_id'];
$user_info = get_user_info($pdo, $userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="reservation.css" rel="stylesheet">
</head>
<body>

<div class="food-img-container">
    <img class="food-img" src="https://www.kone.ca/fr/Images/le-royal-hero-1440x670_tcm93-11647.jpg?v=3" alt="amman img">
    <div class="img-caption">
        Make a Reservation
    </div>
    <div class="form-container" >
    <form action="includes/hotel_reservtion.inc.php" method="POST" style="width:30% ;    padding-top: 28px;margin-top: 32px;" >
    <?php if($user_info){?>
        <input type="hidden" name="userId" value="<?php echo htmlspecialchars($userId); ?>">
        <label for="guest_name">Guest Name:</label><br>
        <input type="text" id="guest_name" name="guest_name" required value="<?php echo htmlspecialchars($user_info['username']); ?>"><br><br>
        <label for="guest_email">Guest Email:</label><br>
        <input type="email" id="guest_email" name="guest_email" required value="<?php echo htmlspecialchars($user_info['email']); ?>"><br><br>
        <label for="check_in_date">Check-in Date:</label><br>
        <input type="date" id="check_in_date" name="check_in_date" required><br><br>
        <label for="check_out_date">Check-out Date:</label><br>
        <input type="date" id="check_out_date" name="check_out_date" required><br><br>
        <label for="room_id">Available Rooms:</label><br>
        <select id="room_id" name="room_id" required style ='width:100%;padding:8px'>
            <option value="">Select Room</option>
            <?php
            // Fetch available rooms from the database
            $stmt = $pdo->query('SELECT id, room_type ,price_per_night FROM rooms WHERE availability_status = "available"');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars(ucfirst($row['room_type']), ENT_QUOTES, 'UTF-8') . ' - $' . htmlspecialchars($row['price_per_night'], ENT_QUOTES, 'UTF-8') . ' per night</option>';
            }
            
            ?>
        </select><br><br>
        <input type="submit" value="Book Now">
    <?php }?>
    </form>
    </div>
</div>
<footer id="footer"></footer>
</body>
</html>
<?php

function get_user_info(object $pdo, $userId){
    $query = "SELECT * FROM users WHERE id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
