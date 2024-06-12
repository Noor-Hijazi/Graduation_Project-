<?php
require 'includes/db.inc.php';
require 'models/guide_whereToGo_model.php';
$guids= amman_guides($pdo);


    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amman</title>
    <link rel="stylesheet" href="css/normaliz.css">
    <link rel="stylesheet" href="css/more.css">
    <link rel="stylesheet" href="css/whereToGo.css">
</head>
<style>
    .restaurant-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 20px;
    justify-content: center;
    margin: 20px;
}

.restaurant-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    margin: 10px;
}

.restaurant-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.restaurant-card h2 {
    font-size: 1.5em;
    margin: 10px 0;
}

.link {
    color: #007bff;
    text-decoration: none;
}

.link:hover {
    text-decoration: underline;
}

.rating-form {
    margin: 10px 0;
}

.rating-select {
    padding: 5px;
    margin: 10px 0;
}

.rating-btn {
    padding: 5px 10px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.rating-btn:hover {
    background: #218838;
}

.reservation-btn {
    padding: 5px 10px;
    background: #ffc107;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px 0;
}

.reservation-btn a {
    color: white;
    text-decoration: none;
}

.reservation-btn:hover {
    background: #00e025;
}

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
    <!-- Start header -->
    <?php
        include("nav.php");
    ?>
    <!-- End header -->
    <div class="landing" style="padding-top:100px">
    
        <div class="continer">
            <h1>Amman</h1>
            <div class="slider">

                <div class="slide">
                    <img src="images/whereToGo/main1.jpg" alt="not found">
                    <img src="images/whereToGo/part1.jpg" alt="not found">
                    <img src="images/whereToGo/part2.jpg" alt="not found">
                    <img src="images/whereToGo/part4.jpg" alt="not found">
                </div>
                <button class="prev" onclick="prevSlide()">&#10094</button>
                <button class="next" onclick="nextSlide()">&#10095</button>
            </div>

        
        
            <!-- Start place info -->
            <div class="info">
                <h2>Overview</h2>
                <p>Amman, capital and largest city of Jordan. It is the residence of the king and the seat of
                    government. The city is built on rolling hills at the eastern boundary of the ʿAjlūn Mountains, on
                    the small, partly perennial Wadi ʿAmmān and its tributaries.

                    Amman, Jordan
                    Amman, Jordan
                    Amman’s focus of settlement throughout history has been the small high triangular plateau (modern
                    Mount Al-Qalʿah) just north of the wadi. Fortified settlements have existed there since remote
                    antiquity; the earliest remains are of the Chalcolithic Age (c. 4000–c. 3000 BCE). Later the city
                    became capital of the Ammonites, a Semitic people frequently mentioned in the Bible; the biblical
                    and modern names both trace back to “Ammon.” The “royal city” taken by King David’s general Joab (II
                    Samuel 12:26) was probably the acropolis atop the plateau. King David sent Uriah the Hittite to his
                    death in battle before the walls of the city so that he might marry his wife, Bathsheba (II Samuel
                    11); the incident is also a part of Muslim folklore. The population of the Ammonite cities was much
                    reduced under King David. David’s son Solomon (flourished 10th century BCE) had Ammonite wives in
                    his harem, one of whom became the mother of Rehoboam, Solomon’s successor as king of Judah.</p>
            </div>
        </div>
        <!-- End place info -->

        <!-- Start guid -->
    
     

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
             <button style = 'padding: 5px 10px; background-color: #218838; margin-bottom:10px;'><a style ='color:white' href="reserve_guide.php?guid_id=<?= $guid['guid_id'] ?>">Make A Reservation</a></button>
                <?php } else { 
            $_SESSION['redirect_url_guide'] = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        ?>
            <button style = 'padding: 5px 10px; background-color: #218838;margin-bottom:10px;'><a style ='color:white' href="login.php?guid_id=<?= urlencode($restaurant['restaurant_id']) ?>">Login</a></button>
        <?php } ?>
        </div>
        <?php 
        $count++;
    endforeach; 
    ?>
            </div>
     
        
    </div></div>
      <!-- End guid -->
      <!-- Start footer  -->
      <footer></footer>
      <!-- End footer -->
    
    <script src="JS/more.js"></script>
    <script src="JS/whereToGo.js"></script>
    <script src="JS/nav.js"></script>
</body>

</html>