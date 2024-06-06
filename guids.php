<?php
    include ("nav.php");

require 'includes/db.inc.php';
try {
    $sql = "SELECT * FROM guids";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $guids = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "error from guides". $e;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guids</title>
        <link rel="stylesheet" href="css/normaliz.css">
    <link rel="stylesheet" href="css/cars.css">
    <link rel="stylesheet" href="css/whereToGo.css">
    <link rel="stylesheet" href="css/guids.css">
</head>
<body>


<div class="landing">
        <div class="continer">
            <div class="content">
                <h1>Guides</h1>
                <p>Explore the Jordan with your knowledgeable guide.</p>
            </div>
        </div>
    </div>

   <div class="guide">
        <div class="filters" style  ="    margin-top: 50px;">
    <form>
        <select name="language-filter" id="language-filter">
            <option value="" disabled selected>Select a language</option>
            <option value="en">English</option>
            <option value="ar">Arabic</option>
            <option value="es">Spanish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="zh">Chinese</option>
        </select>

        <select name="experience-filter" id="experience-filter">
            <option value="" disabled selected>Select Experience</option>
            <option value="o">one</option>
            <option value="t">Two</option>
            <option value="te">Three</option>
            <option value="fr">Four</option>

        </select>
        
<select name="cango-filter" id="can-go-filter">
    <option value="" disabled selected>Select Place</option>
    <option value="Amman">Amman</option>
    <option value="Irbid">Irbid</option>
    <option value="Aqaba">Aqaba</option>
    <option value="Ajloun">Ajloun</option>
    <option value="Jerash">Jerash</option>
    <option value="Madaba">Madaba</option>
    <option value="Mafraq">Mafraq</option>
    <option value="Zarqa">Zarqa</option>
    <option value="Karak">Karak</option>
    <option value="Ma'an">Ma'an</option>
</select>
    </form>
</div>
            <div class="continer">
                <div class="box" data-languages="ar,en" data-experience="te" data-cango="Amman">
    <?php foreach ($guids as $guid): ?>
        <div class="guid">
        <img src="<?= $guid['img'] ?>" alt="<?= $guid['guid_name'] ?>">
            <h2>Name: <?= $guid['guid_name'] ?></h2>
            <p><a href="<?= $guid['email'] ?>" ></a></p>
            <p> Languages: <?= $guid['languages'] ?></p>
            <p> Experience: <?= $guid['experience'] ?> year</p>
            <p> Can go: <?= $guid['can_go'] ?></p>
            <br>
            <?php if(isset($_SESSION["user_id"])){ ?>
            <button><a href="reserve_guide.php?guid_id=<?= $guid['guid_id'] ?>">Book A Trip</a></button>
           <?php }else{
              $_SESSION['redirect_url_guide'] = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
                ?>
            <button><a href="login.php?guid_id=<?= $guid['guid_id'] ?>">Login</a></button>
           <?php } ?>
        </div>
    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
        
    </div>

      <footer></footer>

      <script src="JS/whereToGo.js"></script>
    <script src="JS/nav.js"></script>
</body>
</html>