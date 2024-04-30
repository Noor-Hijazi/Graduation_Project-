<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="restaurant.css">
    <script src="restaurant .js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>WanderWise</title>
    <script>
        $(function(){
            $("#navbar").load("nav.html");
            $("#footer").load("footer.html");
        });
    </script>
</head>
<body>

    <nav id="navbar"></nav>

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
 
    <footer id="footer"></footer>

    
</body>
</html>