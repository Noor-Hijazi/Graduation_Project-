
<?php

require_once "includes/db.inc.php";

require_once "includes/upload_view.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Main CSS -->
      <link rel="stylesheet" type="text/css" href="css/social.css">
</head>
</head>
<body>

    <section>

    <div class="text-container">
      <div class="text">
        <h1>Tourist Experiences</h1>
        <p>See what other travelers are doing in Jordan right now and if you use #WanderWise <br>on your social media posts you might see yourself up here too</p>
      </div></div>
    
      <!-- Start gallery -->
        <div  class="gallery">
          <div class="continer">
            <?php
          displayImages( $pdo)
          ?>
        </div>
      </div>
    </div>
    <a href="ratingForm.php"> <button class="btnn">Share your experience</button></a>
    </section>
         <!-- Start gallery -->
</body>
</html>
