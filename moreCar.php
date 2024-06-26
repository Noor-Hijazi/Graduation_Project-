<?php

    include ("nav.php");
    require_once 'includes/db.inc.php';
    require_once 'models/carDetail_model.inc.php' ;
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="css/normaliz.css">
    <link rel="stylesheet" href="css/more.css">
    
</head>


<?php
    // Check if 'ID' parameter is provided in the URL
    if (isset($_GET['ID'])) {
        $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslash to get just the id 

        // Convert the ID to an integer for safe use
        $carId = (int)$id;
        //function from model
      $result=  get_car_detail( $pdo , $carId);
        ?>
    <!-- Start Landing -->
    <div class="landing" >
        <div class="continer">
<div class ="content">
            <div class="slider" style="z-index: -1;">
            <?php
if ($result) {
    // Start the container for images
    echo '<div class="slide">';

    // Display the main image or fallback to URL
    if (isset($result['imagedata']) && !empty($result['imagedata'])) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['imagedata']) . '" alt="' . htmlspecialchars($result['main_image'] ?? 'Car Image', ENT_QUOTES, 'UTF-8') . '" width="250" class="car-image" />';
    } else {
        echo '<img src="' . htmlspecialchars($result['image_url'], ENT_QUOTES, 'UTF-8') . '" alt="Image not found" width="250" class="car-image" />';
    }

    // Display image one
    if (isset($result['image_data_one']) && !empty($result['image_data_one'])) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_one']) . '" alt="Image one" class="car-image" />';
    } elseif (isset($result['image_url_one']) && !empty($result['image_url_one'])) {
        echo '<img src="' . htmlspecialchars($result['image_url_one'], ENT_QUOTES, 'UTF-8') . '" alt="Image one not found" class="car-image" />';
    }

    // Display image two
    if (isset($result['image_data_two']) && !empty($result['image_data_two'])) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_two']) . '" alt="Image two" class="car-image" />';
    } elseif (isset($result['image_url_two']) && !empty($result['image_url_two'])) {
        echo '<img src="' . htmlspecialchars($result['image_url_two'], ENT_QUOTES, 'UTF-8') . '" alt="Image two not found" class="car-image" />';
    }

    // Display image three
    if (isset($result['image_data_three']) && !empty($result['image_data_three'])) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_three']) . '" alt="Image three" class="car-image" />';
    } elseif (isset($result['image_url_three']) && !empty($result['image_url_three'])) {
        echo '<img src="' . htmlspecialchars($result['image_url_three'], ENT_QUOTES, 'UTF-8') . '" alt="Image three not found" class="car-image" />';
    }

    // Close the image container
    echo '</div>';
} else {
    // Handle the case where no data is found for the provided ID
    echo '<p>No data found for the provided car ID.</p>';
}
?>
                        
        <button class="prev" onclick="prevSlide()">&#10094</button>
        <button class="next" onclick="nextSlide()">&#10095</button>
            </div></div>

        </div>
    </div> 

    <div class="information">
    <div class="continer">
        <!-- continue side -->
        <?php
        if ($result) {
            if(isset($_SESSION["user_id"])){
        echo '<div class="logincontent">
                <p>Login to see the final fare and make a reservation</p>
                <p>pricing per day : '.$result['rental_price'].' JOD</p>
                <a class="button" href="reservationcar.php?ID={'.$result['id'].'}\"> continue</a>
            </div>';
        }
        else{
            // if the user didn't login
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            echo '<div class="logincontent">
            <p>Login to see the final fare and make a reservation</p>
            <p>pricing per day : '.$result['rental_price'].' JOD</p>
           
            <a class="button" href="login.php">login</a>
        </div>';
        
        }
        echo '<!-- informtion -->

        <div class="info">
        <h2>Car name : <span style ="font-weight: 100;">' .$result['name'].'</span> </h2>
            <div class="para">

            <p><span>Brand : </span>'.$result['brand']. '</p>
            <p><span>Fual : </span>'.$result['fuel']. ' </p>
            <p><span>Transmtion : </span> '.$result['transmision']. '</p>
            <p><span>kms Driven : </span> '.$result['kms_driven']. ' km/hr</p>
        </div>
            <h2>Car Details</h2>

<table>
    <thead>
        <tr>
            <th>Property</th>
            <th>Value</th>
         
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Car Name</td>
            <td>'.$result['name']. '</td>
        
        </tr>
        <tr>
            <td>Brand</td>
            <td>'.$result['brand']. '</td>
          
        </tr>
        <tr>
            <td>Transmission</td>
            <td>'.$result['transmision']. '</td>
           
        </tr>
        <tr>
            <td>Fuel Type</td>
            <td>'.$result['fuel']. '</td>
          
        </tr>
        <tr>
            <td>Model Year</td>
            <td>'.$result['model']. '</td>
           
        </tr>
        <tr>
            <td>Count</td>
            <td>'.$result['number_of_car']. '</td>
            
        </tr>
        <tr>
        <td>Seat</td>
        <td>'.$result['seats']. '</td>
        
    </tr>
        <tr>
            <td>Available</td>
            <td>';}?>

            <?php
             if ($result) {
            if($result['available'] == 1){
                  echo "Yes";  

            }
            else{
                echo "False";
            }
        '</td>
            
        </tr>
';}?>
    </tbody>
</table> 
        </div>
</div>
</div>
<!-- End information  -->


   


        <?php }else {
                // Handle the case where no ID is provided in the URL
                echo '<p>No ID provided in the URL.</p>';
            }?>
       <!-- Start Footer -->
       <footer></footer>
    <!-- End Footer -->
 
    <script src="JS/more.js"></script>
    <script src="JS/nav.js"></script>

    </body>

</html>