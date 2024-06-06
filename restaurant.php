
<?php

include_once('nav.php');
include("includes/db.inc.php");

try {
    $sql = "SELECT * FROM restaurants WHERE available = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/restaurant.css">
       <script src="Js/restaurant.js" defer></script>
    <title>Restaurant</title>
</head>
<body>



    <div class="food-img-container">
    <img class="food-img" src="https://romerogroup.jo/wp-content/uploads/2022/05/6-traditional-authentic-jordanian-mediterranian-breakfast-mezze-main-page-scaled.jpg" alt="food img">
    <div class="img-caption">
        Restaurants
    </div>
    </div>
    <select id="categoryFilter">
        <option value="">All</option>
        <option value="Jordanian">Jordanian</option>
        <option value="Cafe">Cafe</option>
        <option value="Middle Eastern">Middle Eastern</option>
        <option value="Lebanese">Mediterranean</option>
     
    </select>
    <div class="restaurant-container">
    <?php foreach ($restaurants as $restaurant): ?>
        <div class="restaurant">
            <h2><?= $restaurant['name'] ?></h2>
            <p><a href="<?= $restaurant['address'] ?>" target="_blank">Address:</a></p>
            <a href="<?= $restaurant['menu_url'] ?>" target="_blank">View Menu</a>
            <br>
           <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($restaurant['img_url']) . '" alt="' . $restaurant['name'] . '">';?>

            
            
            <?php if(isset($_SESSION["user_id"])){ ?>
                <button><a href="reservation.php?restaurant_id=<?= $restaurant['restaurant_id'] ?>">Book Now</a></button>
           <?php }else{
              $_SESSION['redirect_url_rest'] = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
                ?>
            <button><a href="login.php">Login</a></button>
           <?php } ?>
        </div>
    <?php endforeach; ?>
    </div> 
 
    <footer></footer>
    <script src="JS/nav.js"></script>
    
</body>
</html>