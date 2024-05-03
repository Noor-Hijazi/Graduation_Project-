<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <!-- nornalize file -->
 <link rel="stylesheet" href="css/normaliz.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="css/homePage.css">

    <script src="JS/homePage.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Home</title>
</head>
<body>
   <?php
    include("nav.html");
   ?>
   
   <div class="landing">
    <div class="img-slider">
        <button class="prev-btn" onclick="changeSlide(-1)">&#10094;</button>
        <a href ="whereToGo.php" style="color: black;">
        <div class="slider">
            <div class="slide">
                <div class="title"><span>Amman</span>, the capital of Jordan, is a modern city with numerous ancient ruins. 
                    Atop Jabal al-Qala’a hill, the historic Citadel includes the pillars of the Roman Temple of Hercules
                    and the 8th-century Umayyad Palace complex, known for its grand dome. 
                    Built into a different downtown hillside,
                    the Roman Theater is a 6,000-capacity, 2nd-century stone amphitheater offering occasional events.</div>
                <img class="img" alt="amman-img" src="https://lp-cms-production.imgix.net/features/2018/02/amman-jordan-08bcc7bf3103.jpg">

            </div>
            <div class="slide">
                <div class="title"><span>Ajloun</span> is a town in the fertile highlands of north Jordan. It’s overlooked by the ruined Ajloun Castle,
                    originally built in 1184 to defend against the Crusaders. Inside, 
                    the Ajloun Archaeological Museum’s displays include ancient Neolithic artifacts. The Ajloun Castle Trail winds north to the ruined hilltop church of Mar Elias.
                    The Prophet’s Trail continues through orchards and oak trees to the Ajloun Forest Reserve</div>
                    <img class="img" alt="Ajloun-img" src="https://i0.wp.com/www.touristjordan.com/wp-content/uploads/2019/02/Ajloun-Forest-Reserve.jpg?resize=960%2C639&ssl=1">

            </div>
            <div class="slide">
                <div class="title"><span>Irbid</span> is a city in northern Jordan. In a 19th-century Ottoman castle,
                    the Dar Al-Saraya Museum traces the city’s history through locally excavated objects like ceramics
                    and stonework. Yarmouk University’s Museum of Jordanian Heritage also displays cultural artifacts, 
                    including centuries-old stone carvings. A traditional house, once home to a Jordanian poet known as Arar, 
                    is now the Beit Arar cultural center.</div>
                <img class="img" alt="Irbid-img" src="https://www.hotelscombined.com/rimg/dimg/f8/1e/11dda303-city-30043-16abc025aba.jpg?width=1366&height=768&xhint=1505&yhint=1196&crop=true&watermarkposition=lowerright">

            </div>
        
            <div class="slide">
                <div class="title">
                    <span>Al-Kerak</span> is a city in Jordan known for its medieval castle, the Kerak Castle.
                     The castle is one of the three largest castles in the region, the other two being in Syria. 
                     Al-Karak is the capital city of the Karak Governorate. 
                    Al-Karak lies 140 kilometres to the south of Amman on the ancient King's Highway
            
            </div>
        <img class="img" alt="Kerak-img" src="https://i0.wp.com/livinginjordanasexpat.com/wp-content/uploads/2020/05/Living-in-Jordan-As-Expat-Karak-Castle-View.jpg?fit=1200%2C675&ssl=1">

        </div>

        
        <div class="slide">
            <div class="title"><span>Ma`an</span> is one of the governorates of Jordan, it is located south of Amman, Jordan's capital.
                 Its capital is the city of Ma'an. This governorate is the largest in the kingdom of Jordan by area.</div>
                <img class="img" alt="Ma'an-img" src="https://as2.ftcdn.net/v2/jpg/02/54/50/31/1000_F_254503187_TNjYsGp11OQuj7E6wzgTVZFk0swhZ2Kt.jpg">

        </div>
            <div class="slide">
            <div class="title"> <span>Mafraq</span> was first settled in the 4th century BC.
                 It is located about 17 km west of the historic Nabataean and Byzantine town of Umm el-Jimal,
                  which was built in the 1st century. The city was first named "Fudain",
                   which comes from the word for fortress in Arabic.</div>
                <img class="img" alt="Mafraq-img" src="https://live.staticflickr.com/8352/8329118803_d3d8fea35b_b.jpg">

            </div>
            
       

     
            <div class="slide">
                <div class="title"><span>Aqaba</span> is a Jordanian port city on the Red Sea's Gulf of Aqaba. Inhabited since 4000 B.C.,
                     it's home to the Islamic-era Aqaba Fort. Its beach resorts are popular for windsurfing and other water sports,
                      and the area is a top destination for scuba divers, 
                      with notable dive sites including the Yamanieh coral reef in the Aqaba Marine Park, south of the city.</div>
                <img class="img" alt="Aqaba-img" src="https://www.muchbetteradventures.com/magazine/content/images/2023/11/Aqaba_Red_Sea_Jordan_Canva.jpeg">

        </div>

        
            <div class="slide">
            <div class="title"><span>Al-Tafilah</span> is well known for having green gardens which contain olive and fig trees,
                 and grape-vines. Tafilah was first built by the Edomites and was called Tophel. 1100 B.C.
                  There are more than 360 natural springs in the at-Tafilah area,
                   including the natural reservoir of Dana and hot natural springs at Afra and Burbeita.</div>
                <img class="img" alt="Tafilah-img" src="https://cdnimgen.royanews.tv/img/inner/20180128/Ma_in_hto_springs.jpg">

            </div>
            
      
            <div class="slide">
            <div class="title"><span>Salt</span> is a hillside town near Amman, Jordan.
                 Its significance as an Ottoman Empire trading hub is reflected in its Ottoman architecture.
                  The early-20th-century Abu Jaber mansion, now the Historic Old Salt Museum,
                   has Italian frescoed ceilings. An Ottoman mosque overlooks Hammam Street with its food market.
                    The Archaeological Museum focuses on finds from the Chalcolithic era (4500–3300 B.C.) to the 16th century.</div>
                <img class="img" alt="salt-img" src="https://viavii.com/uploads/0000/868/2021/09/06/as-salt-featured-image.jpeg">

        </div>
        
            <div class="slide">
            <div class="title"> <span>Dead Sea</span>, also known by other names, is a landlocked salt lake bordered by Jordan to the east
                 and the occupied Palestine West Bank and Palestine to the west. It lies in the Jordan Rift Valley,
                  and its main tributary is the Jordan River.</div>
            <img class="img" alt="Dead-sea-img" src="https://encrypted-tbn3.gstatic.com/licensed-image?q=tbn:ANd9GcRwJ5oCpaI7q3WSVlu3CTSbux4UU2j7qLkd6eZu-HL_pzY_BzR04TnlwYMmVxmLaNOefTYU4xpZpdWm595ApRT0WWIEF92299_ymWL8-A">

        </div>

            <div class="slide">
                <div class="title"><span>Petra</span> is half-built, half-carved into the rock,
                     and is surrounded by mountains riddled with passages and gorges.
                      It is one of the world's most famous archaeological sites,
                    where ancient Eastern traditions blend with Hellenistic architecture.</div>
                <img class="img" alt="Petra-img" src="https://cdn.thecollector.com/wp-content/uploads/2022/12/what-is-so-special-about-petra-jordan-world-heritage-site.jpg?width=1400&quality=70">

        </div>

        </div>
        </a>

        <button class="next-btn" onclick="changeSlide(1)">&#10095;</button>


    </div></div>
   <?php
      include_once("social-wall.php");
      include_once("FAQ.php");
      include_once("statistics.php");

      include_once("footer.php");
    ?>

</body>
</html>