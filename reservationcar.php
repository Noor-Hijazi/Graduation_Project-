<?php
include_once("nav.php");
require_once 'includes/db.inc.php';
require_once 'views/car_rental_veiw.inc.php';
 // Check if 'ID' parameter is provided in the URL
 if (isset($_GET['ID'])) {
    $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslash to get just the id 

    // Convert the ID to an integer for safe use
    $carId = (int)$id;
    //function from model
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resevation</title>
    <link rel="stylesheet" href="css/reservationcar.css">
</head>
<body>
    <!-- Start car  information -->
    
<!-- <div class="reservation" style="margin-bottom: 100px;">
        <div class="continer">
            <h1>Car Information</h1>
            <form>
                <?php
                display_car_info( $pdo ,  $carId)
                ?>
            <form> 
        </div>
    </div>
-->
    <!-- End car  information -->

    <!-- Start Resevation  -->
    <div class="reservation" style="margin-bottom: 100px;">
        <div class="continer">
            <h1>Car Resevation</h1>
            <form action="includes/car_rental.inc.php" method="post" enctype="multipart/form-data">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date"> 

                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" > 

                <label for="location_from">Location From:</label>
                <input type="text" name="location_from" > 

                <label for="location_to">Location To:</label>
                <input type="text" name="location_to"> 

                <!-- <label for="number_of_car">Number of Cars:</label>
                <input type="number" name="number_of_car" >  -->

                <!-- <label for="payment_method">Payment Method:</label>
                <input type="text" name="payment_method">  -->
                <label>Do You Have A Driving License:</label>
                    <input type="radio" name="driving_license" id="driving_license_yes" value="1"> Yes
                    <input type="radio" name="driving_license" id="driving_license_no" value="0"> No<br> 

                <div id="driving_license_upload" style="display: none;">
                    <label for="image">Upload Driving License:</label>
                    <input type="file" name="image" id="image"> 
                </div>
                

                    
                <input type="text" name="carID" value= '<?php echo $carId; ?>'> 
                <input type="text" name="userID" value= '<?php echo $_SESSION['user_id'] ?>'> 
                <input type="submit" value="Book Car">
    </form>

    <p id="error_message" style="display: none;color:red">You are not able to rent the car without a driving license.</p>
        </div>
    </div><?php } ?> 
    <!-- End Resevation  -->
<script src="JS/car_rental.js"></script>
</body>
</html>