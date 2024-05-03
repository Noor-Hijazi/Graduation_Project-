<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More</title>
    <link rel="stylesheet" href="css/normaliz.css">
    <link rel="stylesheet" href="css/more.css">
</head>

<body>
    <!-- Start Header -->
    <?php 
        include("nav.html");
    ?>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing" >
        <div class="continer">
            <h1 style="margin: 50px 0px">Kia Niro EV</h1>
            <div class="slider" style="z-index: -1;">

                <div class="slide">
                    <img src="images/cars/KIA/niro/kia_niro-ev-2024_asset_carousel_1.jpg" alt="not found">
                    <img src="images/cars/KIA/niro/kia_niro-ev-2024_asset_carousel_1.jpg" alt="not found">
                    <img src="images/cars/KIA/niro/kia_niro-ev-2024_asset_carousel_2.jpg" alt="not found">
                </div>
                <button class="prev" onclick="prevSlide()">&#10094</button>
                <button class="next" onclick="nextSlide()">&#10095</button>
            </div>
            <!-- Start car info -->
            <div class="info">
                <h2>Overview</h2>
                <p>The subcompact Niro EV is the bite-sized appetizer to Kia's growing buffet of electric SUVs. Smaller
                    than EVs such as the Hyundai Ioniq 5, the Ford Mustang Mach-E, and the Volkswagen ID.4, it's also
                    more affordable. The Niro's exterior design turns heads, especially in one of its striking two-tone
                    paint schemes. Its interior looks almost as stylish and modern as its exterior and features digital
                    instruments and eco-friendly materials. Driving range is a workable EPA-estimated 253 miles per
                    charge, and the Niro's 201-horsepower electric motor moves it along with acceptable pep, though it
                    lacks the strong off-the-line acceleration that many EVs offer. Nor is it capable of ultra-fast
                    charging like Kia’s other EVs. It offsets those shortcomings with a generally pleasant driving
                    personality and a price that’s as much as several thousand dollars less than most key rivals’.</p>
            </div>
            <!-- End car info -->
        </div>
    </div>
    <!-- End Landing -->

    <!-- Start Resevation  -->
    <div class="reservation" style="margin-bottom: 100px;">
        <div class="continer">
            <h1>Resevation</h1>
            <form action="" method="post">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="username">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" placeholder="phone number">
                <label for="pickup-date">Pickup-date</label>
                <input type="datetime" name="pickup-date" id="pickup-date" placeholder="Pickup date">
                <label for="return_date">Return_date</label>
                <input type="datetime" name="return_date" id="return_date" placeholder="Return date">
                <input type="submit" value="Reserve">
            </form>
        </div>
    </div>
    <!-- End Resevation  -->
    <!-- Start Footer -->
    <footer></footer>
    <!-- End Footer -->
 
    <script src="JS/more.js"></script>
    <script src="JS/nav.js"></script>
</body>

</html>