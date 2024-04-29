<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="hotel.css" rel="stylesheet"/>
    <script src="hotel.js" defer></script>
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

    <div class="amman-img-container">
        <img class="amman-img" src="https://www.kone.ca/fr/Images/le-royal-hero-1440x670_tcm93-11647.jpg?v=3" alt="amman img">
        <div class="img-caption">
            Hotels
        </div>
        </div>
        <select id="cityFilter">
            <option value="">All</option>
            <option value="Amman">Amman</option>
            <option value="Ajloun">Ajloun</option>
            <option value="Irbid">Irbid</option>
            <option value="Aqaba">Aqaba</option>
            <option value="Petra">Petra</option>
            <option value="Wadi Rum">Wadi Rum</option>
            <option value="Madaba">Madaba</option>

          </select>
          
          <div id="hotelList"></div>
          
        <div class="hotel-container">
        </div>

     <footer id="footer"></footer>
        
    
</body>
</html>