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
   
        <!-- Start header -->
     <!-- Start full page -->
    <!-- <div class="full-page"> -->
 
        <!-- Start header -->
  
        <!-- End header -->
        <!-- Start content -->
        <div class="content">
            <div class="continer">
                <h2>Sign up</h2>
                <form action method="post">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname">

                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname">

                    <label for="email">Email:</label>
                    <input type="email" name="email">

                    <label for="pass">Password:</label>
                    <input type="password" name="pass">

                    <label for="language">language:</label>
                    <select id="language" name="language">
                        <option value="ar">Arabic</option> 
                        <option value="en">English</option> 
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                    </select>
                    <!-- Here include the Nationality -->
                    <!-- <ul id="user-list"></ul> -->
                    <input type="submit" value="Sign up">
                </form>
                <p class="rest-par">Already have an account? <a href="login.php">Log in <i class="fa-thin fa-arrow-right"></i> </a>
                </p>
                <p class="rest-par" style=" position: absolute; bottom: -5px;">Go back to <a href="index.php">Home</a></p>
                <div>
                    <!-- End content -->   
              
</body>

</html>