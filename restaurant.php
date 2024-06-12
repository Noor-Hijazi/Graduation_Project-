<?php
include("nav.php");
require 'includes/db.inc.php';

$category_filter = '';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['category'])) {
    $category_filter = $_GET['category'];
}

try {
    $sql = "SELECT restaurants.*, AVG(res_ratings.rating) AS average_rating
            FROM restaurants
            LEFT JOIN res_ratings ON restaurants.restaurant_id = res_ratings.restaurant_id";
    
    if ($category_filter) {
        $sql .= " WHERE category = :category";
    }
    
    $sql .= " GROUP BY restaurants.restaurant_id";

    $stmt = $pdo->prepare($sql);

    if ($category_filter) {
        $stmt->bindParam(':category', $category_filter);
    }

    $stmt->execute();
    $restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurant_id = $_POST['restaurant_id'];
    $rating = $_POST['rating'];

    if (!is_numeric($restaurant_id) || !is_numeric($rating)) {
        echo "Invalid data submitted.";
        exit(); 
    }

    try {
        $sql = "INSERT INTO res_ratings (restaurant_id, rating) VALUES (:restaurant_id, :rating)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':restaurant_id', $restaurant_id);
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
    <title>Restaurant List</title>
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
    <img class="food-img" src="https://romerogroup.jo/wp-content/uploads/2022/05/6-traditional-authentic-jordanian-mediterranian-breakfast-mezze-main-page-scaled.jpg" alt="food img">
    <div class="img-caption">Restaurants</div>
</div>
<div class="content">
<div class = "continer">
<form method="GET" action="<?= $_SERVER['PHP_SELF'] ?>" class="filter-form">
    <select name="category" id="category">
    <option disabled selected>category</option>
        <option value="">All</option>
        <option value="cafe" <?= $category_filter == 'cafe' ? 'selected' : '' ?>>Cafe</option>
        <option value="restaurant" <?= $category_filter == 'restaurant' ? 'selected' : '' ?>>Restaurant</option>
        <option value="cafe and restaurant" <?= $category_filter == 'cafe and restaurant' ? 'selected' : '' ?>>Cafe and Restaurant</option>
    </select>
    <button type="submit">Filter</button>
</form>

<div class="restaurant-container">
    <?php 
    $count = 0;
    foreach ($restaurants as $restaurant): 
        if ($count >= 6) break;
    ?>
        <div class="restaurant-card">
        <?php
             if (isset($_SESSION["user_id"])) {
                echo '<form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="restaurant_id" value="' . htmlspecialchars($restaurant['restaurant_id'], ENT_QUOTES, 'UTF-8') . '">
                        <button type="submit" name="add" class="love-button"><i class="fas fa-heart"></i></button>
                      </form>';
            }?>
        <?php 
        if (isset($restaurant['image_data_one']) && !empty($restaurant['image_data_one'])) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($restaurant['image_data_one']) . '" alt="' . htmlspecialchars($restaurant['name'], ENT_QUOTES, 'UTF-8') . '" width="250" class="restaurant-image" />';
        } elseif (isset($restaurant['image_url']) && !empty($restaurant['image_url'])) {
            echo '<img src="' . htmlspecialchars($restaurant['image_url'], ENT_QUOTES, 'UTF-8') . '" alt="Image not found" width="250" class="restaurant-image" />';
        } else {
            echo '<img src="' . htmlspecialchars($restaurant['img_url'], ENT_QUOTES, 'UTF-8') . '" alt="Image not found" width="250" class="restaurant-image" />';
        }
        ?>
            <h2><?= htmlspecialchars($restaurant['name'], ENT_QUOTES, 'UTF-8') ?></h2>
            <a href="<?= $restaurant['menu_url'] ?>" target="_blank" class="link">View Menu</a>
            <p><?= $restaurant['address'] ?></p>
            <p>Rating: <?= number_format($restaurant['average_rating'], 1) ?></p>
            <form class="rating-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"> 
                <input type="hidden" name="restaurant_id" value="<?= $restaurant['restaurant_id'] ?>">
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
             <button class="btn-reserve"><a style ='color:white' href="reservation.php?restaurant_id=<?= $restaurant['restaurant_id'] ?>">Make A Reservation</a></button>
                <?php } else { 
            $_SESSION['redirect_url_rest'] = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        ?>
            <button class="btn-reserve"><a style ='color:white' href="login.php?guid_id=<?= urlencode($restaurant['restaurant_id']) ?>">Login</a></button>
        <?php } ?> </div>
    <?php 
        $count++;
    endforeach; 
    ?>
</div>
<button id="load-more-btn"><a href="all_restaurant.php">Load More</a></button></div></div>
</body>
</html>

<?php
echo "<br>";
include("footer.php");
?>
