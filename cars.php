<?php
    include ("nav.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <!-- Asowme Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- nornalize file
    <link rel="stylesheet" href="css/normaliz.css"> -->
    <!-- Main Style -->
    <link rel="stylesheet" href="css/cars.css">
</head>

<body>


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
            </div>

            <div class="items_and_filter">
                <form id="brandFilterForm" action="#car" method="get">
                <ul class="filterCheckBox">
                    <h2>Filters</h2>
                    <li>
                        <h4>Category</h4>
                        <ul>
                        <li>
                            
                            <li><input type="checkbox" name="brand[]" value="KIA"<?php echo isset($_GET['brand']) && in_array('KIA', $_GET['brand']) ? 'checked' : ''; ?>> KIA</li>
                            <li><input type="checkbox" name="brand[]" value="BMW" <?php echo isset($_GET['brand']) && in_array('BMW', $_GET['brand']) ? 'checked' : ''; ?>> BMW</li>
                            <li><input type="checkbox" name="brand[]" value="Mercedes"<?php echo isset($_GET['brand']) && in_array('Mercedes', $_GET['brand']) ? 'checked' : ''; ?>> Mercedes</li>
                            <li><input type="checkbox" name="brand[]" value="Honda" <?php echo isset($_GET['brand']) && in_array('Honda', $_GET['brand']) ? 'checked' : ''; ?>> Honda</li>
                            <li><input type="checkbox" name="brand[]" value="Others"<?php echo isset($_GET['brand']) && in_array('Others', $_GET['brand']) ? 'checked' : ''; ?>> Others</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Transmission</h4>
                        <ul>
                            <li><input type="checkbox" name="transmission[]" value="automatic" <?php echo isset($_GET['transmission']) && in_array('automatic', $_GET['transmission']) ? 'checked' : ''; ?>> Automatic</li>
                            <li><input type="checkbox" name="transmission[]" value="manual"<?php echo isset($_GET['transmission']) && in_array('manual', $_GET['transmission']) ? 'checked' : ''; ?>> Manual</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Fuel</h4>
                        <ul>
                            <li><input type="checkbox" name="fuel[]" value="hybrid"<?php echo isset($_GET['fuel']) && in_array('hybrid', $_GET['fuel']) ? 'checked' : ''; ?>> Hybrid</li>
                            <li><input type="checkbox" name="fuel[]" value="petrol"<?php echo isset($_GET['fuel']) && in_array('petrol', $_GET['fuel']) ? 'checked' : ''; ?>> Petrol</li>
                            <li><input type="checkbox" name="fuel[]" value="electric"<?php echo isset($_GET['fuel']) && in_array('electric', $_GET['fuel']) ? 'checked' : ''; ?>> Electric</li>
                        </ul>
                    </li>
                    <li>
                        <input type="submit" value="Filter">
                        <input type="reset" value="clear" onclick="clearForm()">
                    </li>
                       
                </ul></form>
               

    <div id ="car" class="items">
    <?php
    
    
    include_once("includes/db.inc.php");

    $result = null;
    $conditions = [];
    $params = [];

    // If the form is submitted using GET and has any filter criteria
    if ($_SERVER["REQUEST_METHOD"] === "GET" && (!empty($_GET['brand']) || !empty($_GET['transmission']) || !empty($_GET['fuel']))) {
        // Get the filter values from the form
        $brands = $_GET['brand'] ?? [];
        $transmissions = $_GET['transmission'] ?? [];
        $fuels = $_GET['fuel'] ?? [];
        
        // Add conditions and parameters based on selected brands
        if (!empty($brands)) {
            $placeholders = implode(',', array_fill(0, count($brands), '?'));
            $conditions[] = "brand IN ($placeholders)";
            $params = array_merge($params, $brands);
        }
        
        // Add conditions and parameters based on selected transmissions
        if (!empty($transmissions)) {
            $placeholders = implode(',', array_fill(0, count($transmissions), '?'));
            $conditions[] = "transmision IN ($placeholders)";
            $params = array_merge($params, $transmissions);
        }

        // Add conditions and parameters based on selected fuels
        if (!empty($fuels)) {
            $placeholders = implode(',', array_fill(0, count($fuels), '?'));
            $conditions[] = "fuel IN ($placeholders)";
            $params = array_merge($params, $fuels);
        }
        
        // Combine conditions into a single WHERE clause
        if (!empty($conditions)) {
            $sql = "SELECT * FROM car WHERE " . implode(" AND ", $conditions);
        } else {
            $sql = "SELECT * FROM car";
        }
    } else {
        // If no filter criteria are provided, fetch all results
        $sql = "SELECT * FROM car";
    }
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Database error: " . htmlspecialchars($e->getMessage());
    }

    // Display the filtered results
    if ($result && count($result) > 0) {
        foreach ($result as $row) {
            echo '<div class="box">';
            // form to add this car to the wishlist
            if(isset($_SESSION["user_id"])){
            echo '    <form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="car_id" id="car_id" value = '.$row['id'].'>
                        <button type="submit" name="add" class="love-button"><i class="fas fa-heart"></i></button>
                        </form>';
                    }       
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagedata']) . '" alt="' . $row['main_image'] . '">';
            echo '<div class="info">';
            echo '<p><span>Name: </span>' . htmlspecialchars($row['name']) . '</p>';
            echo '<p>' . htmlspecialchars($row['brand']) . ' - ' . htmlspecialchars($row['transmision']) . ' - ' . htmlspecialchars($row['fuel']) . '</p>';
            echo '<p><span>Price per day:</span> ' . htmlspecialchars($row['rental_price']) . ' JOD</p>';
            echo '</div>';
            echo '<div class="reserve">';
            echo '<a class="button" href="moreCar.php?ID={'.$row['id'].'}\">Details</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Display a message if no results were found
        echo "No Record Found in Car";
    }
    ?>
</div>

            </div>
        </div>
    </div>
    <!-- End filters and cards -->




    <!-- Start Footer -->
   <<?php
    include_once("footer.php");
   ?>
    <!-- End Footer -->



    <!-- JavaScript -->

  
    <script src="JS/car.js"></script>
    <script src="JS/wishlist.js"></script>

</body>

</html>