<?php
    include_once('nav.php');
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share your experience</title>
    <style>
        /* Box styling */
        .form-box {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
            margin-bottom: 150px;
        }

        /* Form styling */
        form {
            
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 5px;
                    
            
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .container{
            margin: 150px auto;
            text-align: center;
            font-size: 25px;;
            color:red;

        }
    </style>
</head>
<body>

<?php
          if(isset($_SESSION["user_id"])){?>
    <div class="form-box">
        <h2>Share your experience</h2>
        
        <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value ="<?php echo  $_SESSION["user_id"]?>">

        <label for="username">Username</label>
            <input type="text" id="username" name="username" value ="<?php echo $_SESSION["user_username"]?>">

            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder ="Location name">

            <label for="experience">Experience</label>
            <textarea id="experience" name="experience" placeholder="Trip experience with a guide"></textarea>

        <input type="file" name="image" accept="image/*">
        <button type="submit" name="submit">Share </button>
    </form>
    </div><?php }
    else{
    ?>
    <div class="container">
        <div >You must login first</div>
        <div><a href="login.php">Login</a></div></div>
    <?php
    }?>
    
    <footer></footer>
     <script src="JS/nav.js"></script>
</body>

</html>
