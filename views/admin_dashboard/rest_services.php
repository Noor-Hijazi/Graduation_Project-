<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';



if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_company'])) {
    $search_company = $_GET['search_company'];
    //from model
    $companies = search_company_by_name($pdo, $search_company);

} else {

    $rest_service =  read_rest_services( $pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Car Services</title>
</head>
<body>
    <div class="page">
        <div class="content"> 
        <form action="" method="GET">
            <input type="text" name="search_car" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>                 
            <h3>HI <?php echo $_SESSION["user_username"]; ?></h3>

            <?php if ($rest_service): ?>
                <?php foreach ($rest_service as $result): ?>
                    <br><br>
                    <p>Name: <?php echo htmlspecialchars($result['name']); ?></p>
                    <p>Menu: <a href="<?php echo htmlspecialchars($result['menu_url']); ?>" target="_blank"><?php echo htmlspecialchars($result['menu_url']); ?></a></p>
                    <p>Address: <?php echo htmlspecialchars($result['address']); ?></p>
                    <p>Category: <?php echo htmlspecialchars($result['category']); ?></p>
                    <p>Remaining  reservtion : <?php echo htmlspecialchars($result['numberOfReservation']); ?> person</p>

                    <!-- Edit form -->
                    <form action="../../includes/admin_dashboard_remove_services.inc.php" method="POST">
                        <input type="hidden" name="restaurant_id" value="<?php echo $result['restaurant_id']; ?>">
                        <button type="submit">Delete</button>
                    </form>

                <?php endforeach; ?> 
            <?php else: ?>
              
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
