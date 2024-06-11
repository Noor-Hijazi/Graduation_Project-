<?php
include("nav.php");
include("includes/db.inc.php");

$hotels = [];  
$city_filter = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['city'])) {
    $city_filter = $_GET['city'];
}

try {
    $sql = "SELECT hotels.*, AVG(ratings.rating) AS average_rating
            FROM hotels
            LEFT JOIN ratings ON hotels.hotel_id = ratings.hotel_id";
    
    if ($city_filter) {
        $sql .= " WHERE city = :city";
    }
    
    $sql .= " GROUP BY hotels.hotel_id";
    
    $stmt = $pdo->prepare($sql);

    if ($city_filter) {
        $stmt->bindParam(':city', $city_filter);
    }
    
    $stmt->execute();
    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_id = $_POST['hotel_id'];
    $rating = $_POST['rating'];

    if (!is_numeric($hotel_id) || !is_numeric($rating)) {
        echo "Invalid data submitted.";
        exit();
    }

    try {
        $sql = "INSERT INTO ratings (hotel_id, rating) VALUES (:hotel_id, :rating)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':hotel_id', $hotel_id);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();
    } catch(PDOException $e) {
        echo "Rating submission failed: " . $e->getMessage();
        exit();
    }

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$pdo = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rest.css">
    <title>Hotel List</title>
</head>
<style>
    /* Love button */

.love-button {

background-color: transparent;
border: 0;
color: white;
padding: 5px 10px;
cursor: pointer;
}
.love-button:hover{
color: red;
}
.love-button i.clicked{

color: red;
}
.love-button i {
font-size: 28px;
color: #eee;
/* text-align: right; */
position: relative;
top: 0;
right: -104px;
}
.love-button i:hover{
color: red;
}
</style>
<body>
<div class="food-img-container">
<img class="food-img" src="https://www.kone.ae/ar/Images/le-royal-hero-1440x670_tcm204-11647.jpg" alt="hotel img">
<div class="img-caption">Hotels</div>
</div>
<div class="content">
<div class = "continer">
<form method="GET" action="<?= $_SERVER['PHP_SELF'] ?>" class="filter-form">
    <select name="city" id="city">
    <option disabled selected>Location</option>
        <option value="">All</option>
        <option value="Amman" <?= $city_filter == 'Amman' ? 'selected' : '' ?>>Amman</option>
        <option value="Aqaba" <?= $city_filter == 'Aqaba' ? 'selected' : '' ?>>Aqaba</option>
        <option value="Dead Sea" <?= $city_filter == 'Dead Sea' ? 'selected' : '' ?>>Dead Sea</option>
        <option value="Irbid" <?= $city_filter == 'Irbid' ? 'selected' : '' ?>>Irbid</option>
        <option value="Jerash" <?= $city_filter == 'Jerash' ? 'selected' : '' ?>>Jerash</option>
    </select>
    <button type="submit">Filter</button>
</form>

<div class="restaurant-container">
    <?php 
    $count = 0;
    foreach ($hotels as $hotel): 
        if ($count >= 6) break;
    ?>
        <div class="restaurant-card">
        <?php
             if (isset($_SESSION["user_id"])) {
                echo '<form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="hotel_id" value="' . htmlspecialchars($hotel['hotel_id'], ENT_QUOTES, 'UTF-8') . '">
                        <button type="submit" name="add" class="love-button"><i class="fas fa-heart"></i></button>
                      </form>';
            }?>
            <img src="<?= $hotel['image_url'] ?>" alt="<?= $hotel['name'] ?>">
            <h2><?= $hotel['name'] ?></h2>
            <p><a href="<?= $hotel['location'] ?>" target="_blank" class="link">Location</a></p>
            <p><?= $hotel['city'] ?></p>
            <p>Rating: <?= number_format($hotel['average_rating'], 1) ?></p>
            <form class="rating-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"> 
                <input type="hidden" name="hotel_id" value="<?= $hotel['hotel_id'] ?>">
                <label class="rating-label" for="rating"></label>
                <select class="rating-select" name="rating" id="rating">
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                <button class="rating-btn" type="submit">Rate</button>
            </form>
        
            <?php if (isset($_SESSION["user_id"])) {?>
             <button class="btn-reserve"><a style ='color:white' href="htl-reservation.php?hotel_id=<?= $hotel['hotel_id']?>">Make A Reservation</a></button>
                <?php } else { 
            $_SESSION['redirect_url_hotel'] = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        ?>
            <button  class="btn-reserve"  ><a style ='color:white' href="login.php?hotel_id=<?= urlencode($hotel['hotel_id']) ?>">Login</a></button>
        <?php } ?>
        </div>
    <?php 
        $count++;
    endforeach; 
    ?>
</div></div></div>
<button id="load-more-btn"><a href="all_hotels.php">Load More</a></button>
</body>
</html>

<?php
echo "<br>";
include("footer.php");
?>
