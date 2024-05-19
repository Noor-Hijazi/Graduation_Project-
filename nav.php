<?php
declare(strict_types = 1 );
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Normalize style -->
        <link rel="stylesheet" type="text/css" href="/css/normalize.css">
        <!--Aswome  Font  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />       
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="css/nav.css">

</head>
<body>
    
  
    <nav>
      <div class="continer">

        
        <a href="index.php"><img class="logo" src="images/WanderWiseLogo.png" alt="logo" ></a>
        
        <i  class="fa-solid fa-sliders icon"></i>
          <ul class="menu-list">
            <li><i class="fa-solid fa-hotel small"></i><a href="index.php">Home</a></li>
            <li><i class="fa-solid fa-hotel small"></i><a href="hotel.php">Hotels</a></li>
            <li><i class="fa-solid fa-utensils small"></i><a href="restaurant.php">Restaurant</a></li>
            <li><i class="fa-solid fa-car small"></i><a href="cars.php">Cars</a></li>  
              <li><i class="fa-solid fa-person-chalkboard small"></i><a href="guids.php">Guides</a></li>
           <li><i class="fa-regular fa-address-card small"></i><a href="about.php">About Us</a></li>
           <?php
          if(isset($_SESSION["user_id"])){?>
           <div class="displayedInSmall">
           <li><i class="fa-regular fa-envelope display"style = "display: flex;"></i><a href="contact.php">Content Us</a></li>
                <li><i class="fa-solid fa-right-to-bracket display"style = "display: flex;"></i><a href="includes/logout.inc.php">Logout</a></li>
                <li><i class="fa-solid fa-user-gear" style = "display: flex;"></i><?php echo $_SESSION["user_username"]?></li>
           </div>
           <?php  }
else{
?>           <div class="displayedInSmall">
<li><i class="fa-regular fa-envelope small"></i><a href="contact.php">Content Us</a></li>
<li><i class="fa-solid fa-user-plus small"></i><a href="signup.php">sign up</a></li>
<li><i class="fa-solid fa-right-to-bracket small"></i></i><a href="login.php">Log in</a></li>
</div><?php }?>
<?php
  if(isset($_SESSION["user_id"])){?>
       <li class="more" style="cursor: pointer;">More
            <div class="content">
              <ul class="displayLinks">
                <li><i class="fa-regular fa-envelope display"></i><a href="contact.php">Content Us</a></li>
                <li><i class="fa-solid fa-right-to-bracket display"></i><a href="includes/logout.inc.php">Logout</a></li>
                <li><i class="fa-solid fa-user-gear" style = "display: flex;"></i><?php echo $_SESSION["user_username"]?></li>
              </ul>
<?php  }
else{
?>
       <li class="more" style="cursor: pointer;">More
            <div class="content">
              <ul class="displayLinks">
                <li><i class="fa-regular fa-envelope display"></i><a href="contact.php">Content Us</a></li>
                 <li><i class="fa-solid fa-user-plus display"></i><a href="signup.php">sign up</a></li>
                <li><i class="fa-solid fa-right-to-bracket display"></i></i><a href="login.php">Login</a></li>
              
              </ul>
    
            </div>
          </li>


<?php }?>

          </ul>
</div>
         </nav>


         <script src="JS/navigation.js"></script>
       
</body>
</html>