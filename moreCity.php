<?php
    include ("nav.php");
    require 'includes/db.inc.php';
    require 'models/admin_dashboard_model.php';
    
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
  <?php  // Check if 'ID' parameter is provided in the URL
    if (isset($_GET['ID'])) {
        $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslash to get just the id 

        // Convert the ID to an integer for safe use
        $guide_id = (int)$id;
        //function from model
        $guide_info = get_guide_info( $pdo, $guide_id);
        if($guide_info){
        ?>
    <div class="info">
        <div class="continer" style="   ">
        <div class="image-feature">
                    <!-- Displaying image -->
                    <?php if ($guide_info['image_url']) { ?>
                        <img src="<?php echo htmlspecialchars($guide_info['image_url']); ?>" alt="Guide Image">
                    <?php } elseif ($guide_info['img_data']) { ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($guide_info['img_data']); ?>" alt="Guide Image">
                    <?php } else { ?>
                        <img src="images/default_image.jpg" alt="No Image">
                    <?php } ?>
                </div>
                <ul class="information">
                    <li><span>Name: </span><?php echo htmlspecialchars($guide_info['guid_name']); ?></li>
                    <li><span>Languages: </span><?php echo htmlspecialchars($guide_info['languages']); ?></li>
                    <li><span>Experience: </span><?php echo htmlspecialchars($guide_info['experience']); ?> Years</li>
                    <li><span>Email: </span><?php echo htmlspecialchars($guide_info['email']); ?></li>
                    <li><span>Can Go: </span><?php echo htmlspecialchars($guide_info['can_go']); ?></li>
                    <li><span>Rating: </span><?php echo htmlspecialchars($guide_info['rating']); ?>/10</li>
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
    </div></div><?php }} ?>
    <!-- End Form -->
    <footer></footer>
    <script src="JS/nav.js"></script>
</body>

</html>