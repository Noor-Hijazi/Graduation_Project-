<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

$users =read_users($pdo);
$driving_license =get_driving_license($pdo);

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_user'])) {
    $name = $_GET['search_user'];
    //from model
    $users = search_users_by_name($pdo, $name);
    $driving_license = get_driving_license($pdo);

} else {
    $users =read_users($pdo);
    $driving_license = get_driving_license($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>users</title>
</head>
<body>
<div class="page">
<div class="sidebar">
            <?php include 'admin_dashboard.php'; ?>
        </div>
        <div class="content">
        <form action="" method="GET">
            <input type="text" name="search_user" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>
      
        <?php foreach ($users as $result): ?>
    <div class="user-info">
        <h3>HI <?php echo $_SESSION["user_username"]; ?></h3>
        <br><br>
        <p>name: <?php echo htmlspecialchars($result['username']); ?></p>
        <p>Email: <?php echo htmlspecialchars($result['email']); ?></p>
        <p>created at: <?php echo htmlspecialchars($result['created_at']); ?></p>
        <p>Category: <?php echo htmlspecialchars($result['role']); ?></p>
        
        <!-- Display the driving license image -->
        <?php if ($driving_license && $driving_license['filename'] && $driving_license['image_data']): ?>
            <?php
            $filename = $driving_license['filename'];
            $imageData = base64_encode($driving_license['image_data']); // Assuming image_data is binary data
            ?>
            <img src="data:image/jpeg;base64,<?php echo $imageData; ?>" alt="Driving License">
        <?php endif; ?>

        <!-- Delete user form -->
        <form action="../../includes/admin_dashbord_delete.inc.php" method="POST">
            <input type="hidden" name="userId" value="<?php echo $result['id']; ?>">
            <button type="submit">Delete</button>
        </form>

        <a href ="users_details.php/ID='<?php echo $result['id'];?>'">Details</a>
    </div>
<?php endforeach; ?>

        </div>
    </div>
</body>
</html>
