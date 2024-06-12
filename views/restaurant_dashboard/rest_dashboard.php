
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["user_username"]. " Dashboard"?></title>

</head>
<body>
    <div class="page">
        <div class="sidebar" style ="padding-right:40px ; padding-left: 20px;">
            <h1 style ="color: white;">Dashboard</h1>
            <ul>
               
                <li><a href="rest_info.php">Company Information </a></li>
                <li><a href="read_rests.php">Restaurents</a></li>
                <li><a href="insert_rest.php">add new rest</a></li>
                <li><a href="delete_rest.php">delete a rest</a></li>
                <li><a href="../../includes/logout.inc.php">Logout</a></li>
            </ul>
        </div>

    </div>
</body>
</html>