<?php
    include ("nav.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> More Information</title>
    <!-- Normalize style -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- Main Style --> 
    
    <link rel="stylesheet" type="text/css" href="css/moreCity.css">
   
</head>

<body>
    <!-- Start header -->

    <!-- End header -->
    <div class="info">
        <div class="continer" style="    padding-top: 150px;">
            <div class="image-feature">
                <img src="images/whereToGo/guids/guid_2.jpg" alt="not found">
            </div>
            <ul class="information">
                <li><span>Name: </span>Ahmad Ali</li>
                <li><span>age: </span>25</li>
                <li><span>Languages: </span> Arabic , German </li>
                <li><span>Experience: </span>1 Year</li>
                <li><span>Nationality: </span>Jordanian</li>
                <li><span>Can Go: </span>Amman , Ajlon , wadirums</li>

            </ul>

        </div>
        <div class="feedback">
            <div class="continer">
                <h3>Related Feedback</h3>
                <ul>
                    <li>
                        <p class="customer-name">Maria Rodriguez</p>
                        <p class="feedback-date">April 18, 2024</p>
                        <p class="comments">The guide was fantastic! Very friendly and went out of their way to make
                            sure we had a great time. Highly recommend!</p>
                    </li>
                    <li>
                        <p class="customer-name">John Smith</p>
                        <p class="feedback-date">April 20, 2024</p>
                        <p class="comments">Our guide was very knowledgeable about the history and culture of the area.
                            They answered all our questions and made the tour enjoyable.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- Start Form -->
    <div class="feedback-form">
        <div class="continer">
        <h2>Guide Feedback</h2>
        <form >
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" >

            <label for="comments">Your Comments:</label>
            <textarea id="comments" name="comments" rows="6" placeholder="Feedback"></textarea>

            <input type="submit" value="Send">
        </form>
    </div></div>
    <!-- End Form -->
    <footer></footer>
    <script src="JS/nav.js"></script>
</body>

</html>