<?php
    require_once "views/signup_view.inc.php";
    require_once "views/login_view.inc.php";
    require_once "includes/config_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>  
    <!-- Normalize style -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!--Aswome  Font  -->
     <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="css/sin.css">
</head>

<body> 

        <!-- Start content -->
        <div class="content">
            <div class="continer">
                <h2>Sign up</h2>
                <form method="POST" action="includes/signup.inc.php">
        <!-- This function to save all info if we have any error -->
                <?php
                    inputes();
            
                ?>
        <button type="submit">Signup</button>
    </form>
    <?php
        check_signup_errors();
    ?>
                </form>
                <p class="rest-par">Already have an account? <a href="login.php">Login </a>
                </p>
                <p class="rest-par" style=" position: absolute; bottom: -5px;">Go back to <a href="index.php">Home</a></p>
                <div>
                    <!-- End content -->   
              
</body>

</html>