<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';



if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_company'])) {
    $name= $_GET['search_company'];
    //from model
    $companies  = search_All_users_by_name($pdo, $name) ;
} else {
    $companies = read_undo_companies($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Deleted companies</title>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'admin_dashboard.php'; ?>
        </div>
        <div class="content">
            <h1>Trash Bin</h1>
        <form action="" method="GET" class="search_form">
                <input type="text" name="search_company" placeholder="Search by name">
                <button type="submit">Search</button>
            </form>  
            <?php if ($companies): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($companies as $result): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($result['username']); ?></td>
                                <td><?php echo htmlspecialchars($result['email']); ?></td>
                                <td><?php echo htmlspecialchars($result['created_at']); ?></td>
                                <td><?php echo htmlspecialchars($result['role']); ?></td>
                                <td>
                                    <form action="../../includes/admin_dashbord_undo.inc.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="userId" value="<?php echo $result['id']; ?>">
                                        <button type="submit">Undo</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No users in trash.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
