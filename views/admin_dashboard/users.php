<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_user'])) {
    $name = $_GET['search_user'];
    $users = search_users_by_name($pdo, $name);
} else {
    $users = read_users($pdo);
}

$driving_license = get_driving_license($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    
    <title>Users</title>
</head>
<body>
    
<div class="page">
    <div class="sidebar">
        <?php include 'admin_dashboard.php'; ?>
    </div>
    <div class="content">
    <h1>Tourists</h1>
      
        <form action="" method="GET" class="search_form">
            <input type="text" name="search_user" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>
       
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Category</th>
                    <th>Driving License</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $result): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['username']); ?></td>
                        <td><?php echo htmlspecialchars($result['email']); ?></td>
                        <td><?php echo htmlspecialchars($result['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($result['role']); ?></td>
                        <td>
                            <?php if ($driving_license && $driving_license['filename'] && $driving_license['image_data']): ?>
                                <?php
                                $imageData = base64_encode($driving_license['image_data']);
                                ?>
                                <img src="data:image/jpeg;base64,<?php echo $imageData; ?>" alt="Driving License" style="width: 50px; height: 50px;">
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="../../includes/admin_dashbord_delete.inc.php" method="POST" style="display: inline;">
                                <input type="hidden" name="userId" value="<?php echo $result['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                            <!-- <a href="users_details.php?ID=<?php echo $result['id']; ?>">Details</a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
