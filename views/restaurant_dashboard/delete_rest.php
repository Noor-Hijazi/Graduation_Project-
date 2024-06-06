<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete a car</title>
</head>
<style>
    form{
        width:30%;
        display: flex;
        flex-direction: column;
    }
</style>
<body>
    <form action="../../includes/rest_dashboard_delete.inc.php" method="post"  enctype="multipart/form-data">

    
        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">

        <label for="name">Name Of rest</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Add">

    </form>
    
</body>
</html>