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

<body>
    <!-- Start header -->
    <?php
        include("nav.html");
    ?>
    <!-- End header -->
    <div class="landing" style="padding-top:150px">
    
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
    </form>
</div>
            <div class="continer">
                <div class="box" data-languages="ar,en" data-experience="te">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                   
                        <p><span>Name:</span>Ahmad Yazan </p>
                        <p><span>Languages:</span> Arabic , English </p>
                        <p><span>Experience:</span> 3 years </p>

                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,es" data-experience="o">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Ali Mohammad </p>
                    <p><span>Languages:</span> Arabic , Spanish </p>
                        <p><span>Experience:</span> 1 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>
                <div class="box" data-languages="ar,en" data-experience="fr">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Yasar Ahmad</p>
                        <p><span>Languages:</span> Arabic , English </p>
                        <p><span>Experience:</span> 4 years </p>

                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,fr" data-experience="t">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Yacoub Ahmad</p>
                    <p><span>Languages:</span> Arabic , French </p>
                        <p><span>Experience:</span> 2 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,de" data-experience="o">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Ahmad Ali</p>
                        <p><span>Languages:</span> Arabic , German </p>
                        <p><span>Experience:</span> 1 year </p>

                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="ar,zh" data-experience="t">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Yazeed Ali </p>
                    <p><span>Languages:</span> Arabic , Chinese </p>
                        <p><span>Experience:</span> 2 year </p>
                        
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>
                <div class="box" data-languages="es,en,de" data-experience="t">
                    <img src="images/whereToGo/guids/guid_2.jpg" alt="not found"  >
                    <p><span>Name:</span>Mostafa Mohammad</p>
                        <p><span>Languages:</span> Spanish , English ,German</p>
                        <p><span>Experience:</span> 2 years </p>
                        <a href="moreCity.php"><button>More</button></a>
                        <button>Reservation</button>
                    
                </div>

                <div class="box" data-languages="es,en,de">
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
      <!-- End guid -->
      <!-- Start footer  -->
      <footer></footer>
      <!-- End footer -->
    
    <script src="JS/more.js"></script>
    <script src="JS/whereToGo.js"></script>
    <script src="JS/nav.js"></script>
</body>

</html>