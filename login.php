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
    <title>Log in</title>
 

    <!-- Normalize style -->
    <link rel="stylesheet" type="text/css" href="css/normaliz.css">

      <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="css/login.css">

   
</head>

<body>

    
 
        <!-- Start header -->

        <!-- Start full page -->
    
        <!-- Start content -->
        <div class="content">
            <div class="continer">
                <h2>Welcome Back</h2>
                <p class="login-par">Login to WanderWise</p>
                <p class="pefect-par">Get a perfect trip in Jordan</p>
                <?php
    //logout in nav
        if(!isset($_SESSION["user_id"])){?>
                <form method="POST" action="includes/login.inc.php">
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username">
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" >
                    </div>
                    <button type="submit">Login</button>
                </form>
      <?php  }
?>    
    
   
    <?php
        check_login_errors();
    ?>

                <p class="rest-par">Reset <a href="forget-email.php">forgotten password</a>
                    or<a href="signup.php"> sign-up</a> if you don't have an account
                    yet.
                </p>
                <p class="rest-par" style=" position: absolute; bottom: -15px;">Go back to <a href="index.php">Home</a></p>
               
                    <!-- End content -->
                </div>
        
   
</div>    <!-- End full page -->
<script src="JS/navigation.js"></script>
</body>

</html>