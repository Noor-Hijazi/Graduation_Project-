<?php

session_start();

// Ensure the user is logged in and the session contains the user_id
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in (e.g., redirect to login page)
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new Restaurant</title>
</head>

<style>
    form{
        width:30%;
        display: flex;
        flex-direction: column;
    }
</style>
<body>
    <form action="../../includes/rest_dashboard_insert.inc.php" method="post"  enctype="multipart/form-data">

    
        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">

        <label for="name">Name Of Restaurant</label>
        <input type="text" name="name" id="name">

        <label for="address">Address</label>
        <input type="text" name="address" id="address">


        <label for="category">Category Of Restaurant</label>
        <input type="text" name="category" id="category">

        <label for="image">Main Image To display</label>
        <input type="file" name="image" id="image">

        
        <label for="menu_url">Menu Image</label>
        <input type="text" name="menu_url" id="menu_url">

 
        <input type="submit" value="Add">

    </form>
</body>
</html>