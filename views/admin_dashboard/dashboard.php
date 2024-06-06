<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';
require_once '../../controller/admin_dashboard_contr.php';
$userID = $_SESSION["user_id"];
$results = read_company_admin($pdo, $userID) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title><?php echo $_SESSION["user_username"]. " Dashboard"; ?></title>
</head>
<style>
  
</style>

<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'admin_dashboard.php'; ?>
        </div>
        <div class="content"> 
            <h1>Welcome, <?php echo $_SESSION['user_username']; ?></h1>
            

            
            <div class="info">
                <?php if ($results): ?>
                    <?php foreach ($results as $result): ?>
                        <div class="para">
                            <p><span>Name: </span><?php echo htmlspecialchars($result['username']); ?></p>
                            <p><span>Email: </span><?php echo htmlspecialchars($result['email']); ?></p>
                            
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No information found.</p>
                <?php endif; ?>
            </div>

            <div class="form-container">
                <h2>Edit Details</h2>
                <form method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($results[0]['username']); ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($results[0]['email']); ?>" required>

                    <input type="submit" value="Save Changes">
                </form>
            </div>
                        <div class="stats">
                <div class="item">
                    <h2>Tourists</h2>
                    <p><?php echo static_login($pdo); ?></p>
                </div>
                <div class="item">
                    <h2>Car Offices</h2>
                    <p><?php echo static_car_company($pdo); ?></p>
                </div>
                <div class="item">
                    <h2>Restaurants</h2>
                    <p><?php echo static_rest_company($pdo); ?></p>
                </div>
                <div class="item">
                    <h2>Hotels</h2>
                    <p><?php echo static_hotel_company($pdo); ?></p>
                </div>
                <div class="item">
                    <h2>Guides</h2>
                    <p><?php echo static_guides_company($pdo); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
