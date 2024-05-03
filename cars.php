<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <!-- Asowme Font -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- nornalize file -->
    <link rel="stylesheet" href="css/normaliz.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="css/cars.css">
</head>

<body>
    
    <!-- Start Header -->
    <?php
        include("nav.html");
    ?>
    <!-- End Header -->
    <!-- Start landing -->
    <div class="landing">
        <div class="continer">
            <div class="content" style="padding-top: 150px;">
                <h1>Car Rentals</h1>
                <p>Get The Perfect Trip In Jordan With Our Cars</p>

            </div>
        </div>
    </div>
    <!-- End landing -->

    <!-- Start filters and cards -->
    <div class="card" style="margin-bottom: 600px;">
        <div class="continer">
            <div class="flexing">
        <i class="fa-solid fa-arrow-down-short-wide display"></i>
            <ul class="filterBox">
                <li class="active" data-car=".all">All</li>
                <li data-car=".petrol">Petrol</li>
                <li data-car=".diesel">Diesel</li>
                <li data-car=".electric">Electric</li>
                <li data-car=".hybrid">Hybrid </li>
            </ul></div>
            
            <div class="items_and_filter">
                <ul class="filterCheckBox">
                    <h2>Filter</h2>
                    <li>
                        <h4>Category</h4>
                        <ul>
                            <li>
                                <input type="checkbox">
                                KIA

                            </li>
                            <li><input type="checkbox"> BMW</li>
                            <li><input type="checkbox"> Marsidace</li>
                            <li><input type="checkbox"> Honda</li>
                            <li><input type="checkbox"> Others</li>
                        </ul>
                    </li>
                    <li>
                        <h4> Price per day</h4>
                        <ul class="price">

                            <!-- Additionally to add the statistics -->
                            <li>
                                <input type="checkbox" class="check_price" data-price=".price_0_50"> JOD 0 - JOD 50

                            </li>
                            <li>
                                <input type="checkbox" class="check_price" data-price=".price_50_100"> JOD 50 - JOD 100

                            </li>
                            <li>
                                <input type="checkbox" class="check_price" data-price=".price_100_150"> JOD 100 - JOD
                                150
                            </li>

                            <li><input type="checkbox" class="check_price" data-price=".price_150_200"> JOD 150 - JOD
                                200 </li>
                            <li><input type="checkbox" class="check_price" data-price=".price_200+"> JOD 200+ </li>
                        </ul>
                    </li>
                    <li>
                        <h4>Transmission</h4>
                        <ul>
                            <li><input type="checkbox"> Automatic</li>
                            <li><input type="checkbox"> Manual</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Review score</h4>

                        <ul>
                            <li><input type="checkbox"> Very good +5</li>
                            <li><input type="checkbox"> Good -4</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Supplier</h4>
                        <ul>

                            <li><input type="checkbox"> Rozana</li>
                            <li><input type="checkbox"> Benz</li>
                        </ul>
                    </li>
                </ul>
                <div class="items">
                    <div class="box all hybrid" data-prices="price_200+">
                        <img class ="main_image" src="images/cars/KIA/soul/kia_soul_2024_mep_dynamic_media_XL.jpg" alt="not found">
                        <div class="info">
                            <p><span>Name: </span> Soul 2024</p>
                            <p><span>Type:</span> KIA</p>
                            <p><span>Transmission:</span> Automatic</p>
                            <p><span>Seats:</span> 4</p>
                            <p><span>Color:</span> Selver</p>
                            <p><span>Price:</span> 100 JOD</p>
                            <p><span>Supplier:</span> Rozana</p>
                            <p><span>Review score :</span> 5</p>
                        </div>
                        <div class="reserve">
                           <a href="moreCar.php"><button>Reservation</button></a> 
                        </div>
                    </div>
                    <div class="box all hybrid" data-prices="price_200+">
                        <img class ="main_image" src="images/cars/KIA/soul/kia_soul_2024_mep_dynamic_media_XL.jpg" alt="not found">
                        <div class="info">
                            <p><span>Name: </span> Soul 2024</p>
                            <p><span>Type:</span> KIA</p>
                            <p><span>Transmission:</span> Automatic</p>
                            <p><span>Seats:</span> 4</p>
                            <p><span>Color:</span> Selver</p>
                            <p><span>Price:</span> 100 JOD</p>
                            <p><span>Supplier:</span> Rozana</p>
                            <p><span>Review score :</span> 5</p>
                        </div>
                        <div class="reserve">
                           <a href="moreCar.php"><button>Reservation</button></a> 
                        </div>
                    </div>
                    <div class="box all hybrid" data-prices="price_200+">
                        <img class ="main_image" src="images/cars/KIA/soul/kia_soul_2024_mep_dynamic_media_XL.jpg" alt="not found">
                        <div class="info">
                            <p><span>Name: </span> Soul 2024</p>
                            <p><span>Type:</span> KIA</p>
                            <p><span>Transmission:</span> Automatic</p>
                            <p><span>Seats:</span> 4</p>
                            <p><span>Color:</span> Selver</p>
                            <p><span>Price:</span> 100 JOD</p>
                            <p><span>Supplier:</span> Rozana</p>
                            <p><span>Review score :</span> 5</p>
                        </div>
                        <div class="reserve">
                           <a href="moreCar.php"><button>Reservation</button></a> 
                        </div>
                    </div>
                    <div class="box all hybrid" data-prices="price_200+">
                        <img class ="main_image" src="images/cars/KIA/soul/kia_soul_2024_mep_dynamic_media_XL.jpg" alt="not found">
                        <div class="info">
                            <p><span>Name: </span> Soul 2024</p>
                            <p><span>Type:</span> KIA</p>
                            <p><span>Transmission:</span> Automatic</p>
                            <p><span>Seats:</span> 4</p>
                            <p><span>Color:</span> Selver</p>
                            <p><span>Price:</span> 100 JOD</p>
                            <p><span>Supplier:</span> Rozana</p>
                            <p><span>Review score :</span> 5</p>
                        </div>
                        <div class="reserve">
                           <a href="moreCar.php"><button>Reservation</button></a> 
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End filters and cards -->
    <!-- Start Footer -->
    <footer>

    </footer>
    <!-- End Footer -->
    <!-- JavaScript -->
   
    <script src="JS/nav.js"></script> 
    <script src="JS/car.js"></script>
</body>

</html>