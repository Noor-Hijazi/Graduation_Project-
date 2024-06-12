<?php
include("nav.php");
include("includes/db.inc.php");

$guids = [];
$can_go_filter = '';
$language_filter = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['can_go'])) {
        $can_go_filter = $_GET['can_go'];
    }
    if (isset($_GET['language'])) {
        $language_filter = $_GET['language'];
    }
}

try {
    $sql = "SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id";
    
    $conditions = [];
    if ($can_go_filter) {
        // Use FIND_IN_SET for comma-separated can_go values
        $conditions[] = "FIND_IN_SET(:can_go, can_go)";
    }
    if ($language_filter) {
        // Use LIKE for partial matching in comma-separated languages
        $conditions[] = "languages LIKE :language";
    }
    
    if ($conditions) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    
    $sql .= " GROUP BY guids.guid_id";
    
    $stmt = $pdo->prepare($sql);

    if ($can_go_filter) {
        $stmt->bindParam(':can_go', $can_go_filter, PDO::PARAM_STR);
    }
    if ($language_filter) {
        // Add wildcard % to language filter
        $language_filter = '%' . $language_filter . '%';
        $stmt->bindParam(':language', $language_filter, PDO::PARAM_STR);
    }
    
    $stmt->execute();
    $guids = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rest.css">
    <title>guide</title>
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
    <img class="food-img" src="https://images.pexels.com/photos/6108074/pexels-photo-6108074.jpeg" alt="food img">
    <div class="img-caption">Guides</div>
</div>
<div class="content">
<div class = "continer">
   
<form method="GET" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="filter-form">
    <select name="can_go" id="can_go">
        <option disabled selected>Location</option>
        <option value="">All</option>
        <option value="Amman" <?= $can_go_filter == 'Amman' ? 'selected' : '' ?>>Amman</option>
        <option value="Aqaba" <?= $can_go_filter == 'Aqaba' ? 'selected' : '' ?>>Aqaba</option>
        <option value="Dead Sea" <?= $can_go_filter == 'Dead Sea' ? 'selected' : '' ?>>Dead Sea</option>
        <option value="Irbid" <?= $can_go_filter == 'Irbid' ? 'selected' : '' ?>>Irbid</option>
        <option value="Jerash" <?= $can_go_filter == 'Jerash' ? 'selected' : '' ?>>Jerash</option>
    </select>

    
    <select name="language" id="language">
    <option disabled selected>Languages</option>
        <option value="">All</option>
        <option value="Arabic" <?= $language_filter == 'Arabic' ? 'selected' : '' ?>>Arabic</option>
        <option value="English" <?= $language_filter == 'English' ? 'selected' : '' ?>>English</option>
        <option value="French" <?= $language_filter == 'French' ? 'selected' : '' ?>>French</option>
        <option value="Spanish" <?= $language_filter == 'Spanish' ? 'selected' : '' ?>>Spanish</option>
    </select>

    <button type="submit">Filter</button>
</form>

<div class="restaurant-container">
    <?php 
    $count = 0;
    foreach ($guids as $guid): 
        if ($count >= 6) break;
    ?>
        <div class="restaurant-card">
            <?php
             if (isset($_SESSION["user_id"])) {
                echo '<form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="guid_id" value="' . htmlspecialchars($guid['guid_id'], ENT_QUOTES, 'UTF-8') . '">
                        <button type="submit" name="add" class="love-button"><i class="fas fa-heart"></i></button>
                      </form>';
            }?>
        <?php
        if (isset($guid['img_data']) && !empty($guid['img_data'])) {
            // Display the image using base64 encoding
            echo '<img src="data:image/jpeg;base64,' . base64_encode($guid['img_data']) . '" alt="' . htmlspecialchars($guid['img'] ?? 'Guide Image', ENT_QUOTES, 'UTF-8') . '" class="car-image" />';
        } else {
            // Fallback to the URL-based image
            echo '<img src="' . htmlspecialchars($guid['image_url'], ENT_QUOTES, 'UTF-8') . '" alt="Image not found" class="car-image" />';
        }
        ?>
            <h2><?= $guid['guid_name'] ?></h2>
            <li><span>Email: </span><a href="mailto:<?php echo htmlspecialchars($guid['email']); ?>" class="link"><?php echo htmlspecialchars($guid['email']); ?></a></li>

            <p>Can go: <?= $guid['can_go'] ?></p>
            <p>Languages: <?= $guid['languages'] ?></p>
            
            
            <p>Rating: <?= number_format($guid['average_rating'], 1) ?></p>
            
            
            <form class="rating-form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"> 
                <input type="hidden" name="guid_id" value="<?= $guid['guid_id'] ?>">
                
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
             <button class="btn-reserve"><a style ='color:white' href="reserve_guide.php?guid_id=<?= $guid['guid_id'] ?>">Make A Reservation</a></button>
                <?php } else { 
            $_SESSION['redirect_url_guide'] = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        ?>
            <button class="btn-reserve"><a style ='color:white' href="login.php?guid_id=<?= urlencode($restaurant['restaurant_id']) ?>">Login</a></button>
        <?php } ?>
        </div>
        <?php 
        $count++;
    endforeach; 
    ?>
</div>
    <button id="load-more-btn"><a href="all_guids.php">Load More</a></button>

</div></div>
</body>
</html>

<?php
include("footer.php");
?>