<?php
include ('nav.php');
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
    if (isset($_GET['guid_id'])) {
        $id = trim($_GET['guid_id'], '{}\\'); // Trim any curly braces and backslash to get just the id 

        // Convert the ID to an integer for safe use
        $guid_id = (int)$id;
    ?>

    <div class="food-img-container">
        <img class="food-img" src="images/whereToGo/part4.jpg" alt="food img">
        <div class="img-caption">Make a Reservation</div>
        <div class="form-container">
            <form action="" method="post">
                <input type="hidden" name="userId" value="<?php echo $_SESSION["user_id"]; ?>">
                <input type="hidden" name="guid_id" value="<?php echo $guid_id; ?>">

                <label for="customer_name">Your Name:</label>
                <input type="text" id="customer_name" name="customer_name" value="<?php echo $_SESSION["user_username"]; ?>" required><br><br>
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user_email;?>"><br>
                
                <label for="meetup">Meet Up Time:</label><br><br>
                <input type="datetime-local" id="meetup" name="meetup" required><br><br>
                
                <label for="notes">Notes Or Any Place You Wish To Visit:</label>
                <input type="text" id="notes" name="notes" required><br><br>
                
                <input type="submit" value="Confirm Reservation">
            </form>
        </div>
    </div>
    <footer id="footer"></footer>
</body>
</html>

<?php
    } else {
        // echo "Guid ID not provided";
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_POST['userId']; 
        $guid_id = $_POST['guid_id']; 
        $customer_name = $_POST['customer_name'];
        $email = $_POST['email'];
        $meetup = $_POST['meetup'];
        $notes = $_POST['notes']; 

        $sql = "INSERT INTO guids_reservation (guid_id, customer_name, email, meetup, notes,userId)
                VALUES (:guid_id, :customer_name, :email, :meetup, :notes,:userId)";
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':guid_id', $guid_id);
        $stmt->bindParam(':customer_name', $customer_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':meetup', $meetup); 
        $stmt->bindParam(':notes', $notes);

        if ($stmt->execute()) {
            echo "<script>alert('Reservation successful');</script>";
        } else {
            echo "Error in reservation";
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
