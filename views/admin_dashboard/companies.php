<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_company'])) {
    $search_company = $_GET['search_company'];
    $companies = search_company_by_name($pdo, $search_company);
} else {
    $companies = read_companies($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Companies</title>
</head>
<body>
<div class="page">
    <div class="sidebar">
        <?php include 'admin_dashboard.php'; ?>
    </div>
    <div class="content">
    <h1>Companies</h1>
        <form action="" method="GET" class="search_form">
            <input type="text" name="search_company" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>
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
                <?php if ($companies): ?>
                    <?php foreach ($companies as $result): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($result['username']); ?></td>
                            <td><?php echo htmlspecialchars($result['email']); ?></td>
                            <td><?php echo htmlspecialchars($result['created_at']); ?></td>
                            <td><?php echo htmlspecialchars($result['role']); ?></td>
                            <td>
                                <form action="../../includes/admin_dashbord_delete.inc.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="userId" value="<?php echo $result['id']; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No companies registered.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
