<?php
    include ("nav.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Normalize style -->
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="css/restaurant.css">
   
    <!-- Main JS -->
    <script src="Js/restaurant .js" defer></script>
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
      
    </div> 
 
    <footer></footer>
    <script src="JS/nav.js"></script>
    
</body>
</html>