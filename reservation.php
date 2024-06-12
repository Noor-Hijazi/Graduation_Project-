<?php
include('nav.php');
include("includes/db.inc.php"); 

$userId= $_SESSION["user_id"];
$user_email =  get_user_email( $pdo , $userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="reservation.css" rel="stylesheet">
    <title>WanderWise</title>

</head>
<body>
    <?php
if(isset($_GET['restaurant_id'])) {
    $restaurantId = $_GET['restaurant_id'];
} else {

}
?>

<div class="food-img-container">
        <img class="food-img" src="https://traveler.marriott.com/wp-content/uploads/2019/10/GI_924240792_Jordan_Meze.jpg" alt="food img">
        <div class="img-caption">
                Make a Reservation
            </div>
        <div class="form-container">
        <form action="reservation.php" method="post">
        <input type="hidden" id="selected_restaurant" name="restaurant_id" value="<?php echo $restaurantId; ?>">
        <input type="hidden" name="userId" value="<?php echo $_SESSION["user_id"]; ?>">
        <label for="user_name">Your Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $_SESSION["user_username"]; ?>"><br><br>
        
        <label for="user_email">Your Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user_email;?>"><br>
        
        <label for="reservation_date">Date:</label>
        <input type="date" id="reservation_date" name="reservation_date" required><br><br>
        
        <label for="reservation_time">Time:</label>
        <input type="time" id="reservation_time" name="reservation_time" required><br><br>
        
        <label for="num_people">Number of People:</label>
        <input type="number" id="num_people" name="num_people" required min="1"><br><br>
        
        <input type="submit" value="Confirm Reservation">
</form>

        </div>
    </div>
    <footer id="footer"></footer>

</body>
</html>
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId']; 
    $restaurant_id = $_POST['restaurant_id']; 
    $user_name = $_POST['user_name'];
    $user_email = $_POST['email'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $num_people = $_POST['num_people'];

    $pdo->beginTransaction();

    try {
        $sql_check_available = "SELECT NumberOfReservation FROM Restaurants WHERE restaurant_id = :restaurant_id";
        $stmt_check_available = $pdo->prepare($sql_check_available);
        $stmt_check_available->bindParam(':restaurant_id', $restaurant_id);
        $stmt_check_available->execute();
        $row = $stmt_check_available->fetch(PDO::FETCH_ASSOC);
        $num_reservations = $row['NumberOfReservation'];

        if ($num_reservations <= 0) {
            echo
            "<script>alert('No tables available for reservation at this time. Please choose another restaurant.');</script>";
            exit;
        } elseif ($num_reservations < $num_people) {
            echo
            "<script>alert('No tables available for $num_people people at this time. Please choose another time or reduce the number of people.');</script>";
            exit;
        }

        $sql = "INSERT INTO Reservations (restaurant_id, user_name, user_email, reservation_date, reservation_time, num_people,userId)
        VALUES (:restaurant_id, :user_name, :user_email, :reservation_date, :reservation_time, :num_people,:userId)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':restaurant_id', $restaurant_id);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_email', $user_email);
        $stmt->bindParam(':reservation_date', $reservation_date);
        $stmt->bindParam(':reservation_time', $reservation_time);
        $stmt->bindParam(':num_people', $num_people);
        $stmt->execute();

        $sql_update = "UPDATE restaurants SET NumberOfReservation = NumberOfReservation - :num_people WHERE restaurant_id = :restaurant_id";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->bindParam(':restaurant_id', $restaurant_id);
        $stmt_update->bindParam(':num_people', $num_people);
        $stmt_update->execute();

        $pdo->commit();
        echo "<script>alert('Reservation successful');</script>";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error in reservation: " . $e->getMessage();
    }
}

function get_user_email(object $pdo , $userId){
    $query = "SELECT email FROM users WHERE id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['email'] : null;
}

?>

