<?php
require '../../includes/db.inc.php';
require '../../models/carDetail_model.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <div>
        <div class="sidebar">
            <?php include 'car_dashboard.php';?>
        </div>
        <div class="content">
            <?php
            // Check if 'ID' parameter is provided in the URL
            if (isset($_GET['ID'])) {
                $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslash to get just the id 

                // Convert the ID to an integer for safe use
                $carId = (int)$id;
                //function from model
                $result = get_car_detail($pdo, $carId);
                ?>
                <!-- Start Landing -->
                <div class="landing">
                    <div class="continer">
                        <div class="content">
                            <div class="slider" style="z-index: -1;">
                                <?php
                                // Check if any results were returned
                                if ($result) {
                                    // Display the images from the fetched data
                                    echo '<div class="slide">';
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['imagedata']) . '" alt="' . $result['main_image'] . '">';
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_one']) . '" alt="' . $result['image_one'] . '">';
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_two']) . '" alt="' . $result['image_two'] . '">';
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_three']) . '" alt="' . $result['image_three'] . '">';
                                    echo '</div>';
                                } else {
                                    // Handle the case where no data is found for the provided ID
                                    echo '<p>No data found for the provided car ID.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="information">
                    <div class="continer">
                        
                        <div class="info">
                            <h2>Car name: <span style="font-weight: 100;"><?php echo $result['name']; ?></span></h2>
                            <div class="para">
                                <p><span>Brand: </span><?php echo $result['brand']; ?></p>
                                <p><span>Fuel: </span><?php echo $result['fuel']; ?></p>
                                <p><span>Transmission: </span><?php echo $result['transmision']; ?></p>
                                <p><span>Kms Driven: </span><?php echo $result['kms_driven']; ?> km/hr</p>
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
                                        <td><?php echo $result['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Brand</td>
                                        <td><?php echo $result['brand']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Transmission</td>
                                        <td><?php echo $result['transmision']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fuel Type</td>
                                        <td><?php echo $result['fuel']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Model Year</td>
                                        <td><?php echo $result['model']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Count</td>
                                        <td><?php echo $result['number_of_car']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Seat</td>
                                        <td><?php echo $result['seats']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Available</td>
                                        <td><?php echo ($result['available'] == 1) ? "Yes" : "False"; ?></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                  <?php      echo '<a class="button" href="edite_car.php?ID=' . htmlspecialchars($result['id']) . '">Edit</a>';?>

                    </div>
                </div>
                <!-- End information  -->
            <?php } else {
                // Handle the case where no ID is provided in the URL
                echo '<p>No ID provided in the URL.</p>';
            } ?>
        </div>
    </div>
</body>
</html>
