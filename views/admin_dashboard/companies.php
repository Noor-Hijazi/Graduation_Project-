<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_company'])) {
    $search_company = $_GET['search_company'];
    //from model
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
    <link rel="stylesheet" href="style.css">
    <title>Companies</title>
</head>
<body>
<div class="page">
    <div class="content">
        <form action="" method="GET">
            <input type="text" name="search_company" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>

        <?php if ($companies): ?>
            <?php foreach ($companies as $result): ?>
                <h3>HI <?php echo $_SESSION["user_username"]; ?></h3>
                <br><br>
                <p>Name: <?php echo htmlspecialchars($result['username']); ?></p>
                <p>Email: <?php echo htmlspecialchars($result['email']); ?></p>
                <p>Created at: <?php echo htmlspecialchars($result['created_at']); ?></p>
                <p>Category: <?php echo htmlspecialchars($result['role']); ?></p>

                <form action="../../includes/admin_dashbord_delete.inc.php" method="POST">
                    <input type="hidden" name="userId" value="<?php echo $result['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No companies registered.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
