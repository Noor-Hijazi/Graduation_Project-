<?php
    include ("nav.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guids</title>
        <!-- nornalize file -->
        <link rel="stylesheet" href="css/normaliz.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="css/cars.css">
    <link rel="stylesheet" href="css/whereToGo.css">
    <link rel="stylesheet" href="css/guids.css">
</head>
<body>
    <!-- Start Header -->
    <?php
    include("nav.html");
    ?>
  <!-- End Header -->
<!-- Start Landing -->
<div class="landing">
        <div class="continer">
            <div class="content">
                <h1>Guides</h1>
                <p>Explore the Jordan with your knowledgeable guide.</p>
            </div>
        </div>
    </div>
  <!-- End Landing -->

   <!-- Start guide -->
   <div class="guide">
        <div class="filters">
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
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                   
                        <p><span>Name:</span>Ahmad Yazan </p>
                        <p><span>Languages:</span> Arabic , English </p>
                        <p><span>Experience:</span> 3 years </p>

                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,es" data-experience="o" data-cango="Amman , Irbid">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Ali Mohammad </p>
                    <p><span>Languages:</span> Arabic , Spanish </p>
                        <p><span>Experience:</span> 1 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>
                <div class="box" data-languages="ar,en" data-experience="fr"  data-cango="Jerash ,Amman">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Yasar Ahmad</p>
                        <p><span>Languages:</span> Arabic , English </p>
                        <p><span>Experience:</span> 4 years </p>

                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,fr" data-experience="t" data-cango="Karak,Ajloun,Amman">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Yacoub Ahmad</p>
                    <p><span>Languages:</span> Arabic , French </p>
                        <p><span>Experience:</span> 2 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,de" data-experience="o" data-cango="Jerash,Aqaba,Amman">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Ahmad Ali</p>
                        <p><span>Languages:</span> Arabic , German </p>
                        <p><span>Experience:</span> 1 year </p>

                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,zh" data-experience="t" data-cango="Amman,Jerash">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Yazeed Ali </p>
                    <p><span>Languages:</span> Arabic , Chinese </p>
                        <p><span>Experience:</span> 2 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>
                <div class="box" data-languages="es,en,de" data-experience="t" data-cango="Karak,Ajloun,Amman">
                <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Mostafa Mohammad</p>
                        <p><span>Languages:</span> Spanish , English ,German</p>
                        <p><span>Experience:</span> 2 years </p>
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="es,en,de" data-cango="Karak,Ajloun,Amman">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Basal Yazan </p>
                    <p><span>Languages:</span>  Spanish , English ,German</p>
                        <p><span>Experience:</span> 1 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <a href="reserve.php"><button>Reservation</button></a>
                    
                </div>
            </div>
        </div>
        
    </div>
      <!-- End guide -->
      <!-- Start footer -->
      <footer></footer>
      <!-- End footer -->

      <!-- Scripts -->
      <script src="JS/whereToGo.js"></script>
    <script src="JS/nav.js"></script>
</body>
</html>