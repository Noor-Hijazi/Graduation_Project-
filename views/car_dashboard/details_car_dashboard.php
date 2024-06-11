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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .page {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background-color: #f4f4f4;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            overflow-x: auto;
        }
        .information {
            margin-top: 20px;
        }
        .information h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .information .para {
            margin-bottom: 20px;
        }
        .information .para p {
            margin: 5px 0;
        }
        .information table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .information th, .information td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .information th {
            background-color: #f2f2f2;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .slider img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'car_dashboard.php';?>
        </div>
        <div class="content">
            <?php
            // Check if 'ID' parameter is provided in the URL
            if (isset($_GET['ID'])) {
                $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslash to get just the id 
                $carId = (int)$id; // Convert the ID to an integer for safe use

                $result = get_car_detail($pdo, $carId);

                // Check if any results were returned
                if ($result):
            ?>
                <div class="landing">
                    <div class="continer">
                        <div class="content">
                            <div class="slider" style="z-index: -1;">
                                <?php
                                // Display images from the fetched data
                                if ($result['imagedata']) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['imagedata']) . '" alt="' . htmlspecialchars($result['main_image']) . '">';
                                }
                                if ($result['image_data_one']) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_one']) . '" alt="' . htmlspecialchars($result['image_one']) . '">';
                                }
                                if ($result['image_data_two']) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_two']) . '" alt="' . htmlspecialchars($result['image_two']) . '">';
                                }
                                if ($result['image_data_three']) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_three']) . '" alt="' . htmlspecialchars($result['image_three']) . '">';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="information">
                    <div class="continer">
                        <div class="info">
                            <h2>Car name: <span style="font-weight: 100;"><?php echo htmlspecialchars($result['name']); ?></span></h2>
                            <div class="para">
                                <p><span>Brand: </span><?php echo htmlspecialchars($result['brand']); ?></p>
                                <p><span>Fuel: </span><?php echo htmlspecialchars($result['fuel']); ?></p>
                                <p><span>Transmission: </span><?php echo htmlspecialchars($result['transmision']); ?></p>
                                <p><span>Kms Driven: </span><?php echo htmlspecialchars($result['kms_driven']); ?> km/hr</p>
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
                                        <td><?php echo htmlspecialchars($result['name']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Brand</td>
                                        <td><?php echo htmlspecialchars($result['brand']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Transmission</td>
                                        <td><?php echo htmlspecialchars($result['transmision']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fuel Type</td>
                                        <td><?php echo htmlspecialchars($result['fuel']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Model Year</td>
                                        <td><?php echo htmlspecialchars($result['model']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Count</td>
                                        <td><?php echo htmlspecialchars($result['number_of_car']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Seats</td>
                                        <td><?php echo htmlspecialchars($result['seats']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Available</td>
                                        <td><?php echo ($result['available'] == 1) ? "Yes" : "No"; ?></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <a class="button" href="edite_car.php?ID=<?php echo htmlspecialchars($result['id']); ?>">Edit</a>
                    </div>
                </div>
            <?php
                else:
                    // Handle the case where no data is found for the provided ID
                    echo '<p>No data found for the provided car ID.</p>';
                endif;
            } else {
                // Handle the case where no ID is provided in the URL
                echo '<p>No ID provided in the URL.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
