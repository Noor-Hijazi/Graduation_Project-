<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget password</title>
    <!-- Normalize style -->
    <link rel="stylesheet" type="text/css" href="css/normaliz.css">
    <!--Font Aswome  -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
</head>

<body>

    <div class="content" style="height: 450px;">
        <div class="continer">
        <h2 style="margin-top: 30px;">Reset your password</h2>
            <p class="login-par">No sweat! Input your email below and we'll send you instructions to reset it.</p>
            <form action="includes/forettingpwd.inc.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email">
                <input type="submit" value="Send">
            </form>
            <p class="rest-par"> <a href="login.php">Return to login</a> </p>
            <p class="rest-par" style=" position: absolute; bottom: 50px;">Go back to <a href="index.php">Home</a></p>
            <div>
</body>

</html>