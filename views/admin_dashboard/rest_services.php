<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_company'])) {
    $name = trim($_GET['search_company']);
    $rest_service = search_rest_by_name($pdo, $name);
} else {
    $rest_service = read_rest_services($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Restaurant Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .page {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background-color: #f4f4f4;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            overflow-x: auto;
        }
        .search_form {
            margin-bottom: 20px;
            display: flex;
        }
        .search_form input[type="text"] {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search_form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search_form button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            color: #007bff;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
        td a:visited {
            color: #551a8b;
        }
        td button {
            background-color: #2EC6FD;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    
        td .menu-link {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'admin_dashboard.php'; ?>
        </div>
        <div class="content">
            <form action="" method="GET" class="search_form">
                <input type="text" name="search_company" placeholder="Search by name" value="<?php echo htmlspecialchars($_GET['search_company'] ?? ''); ?>">
                <button type="submit">Search</button>
            </form>
            <?php if ($rest_service): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Menu</th>
                            <th>Address</th>
                            <th>Category</th>
                            <th>Remaining Reservations</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rest_service as $result): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($result['name']); ?></td>
                                <td>
                                    <a href="<?php echo htmlspecialchars($result['menu_url']); ?>" target="_blank" class="menu-link" title="<?php echo htmlspecialchars($result['menu_url']); ?>">
                                        <?php echo strlen($result['menu_url']) > 30 ? substr(htmlspecialchars($result['menu_url']), 0, 27) . '...' : htmlspecialchars($result['menu_url']); ?>
                                    </a>
                                </td>
                                <td><?php echo htmlspecialchars($result['address']); ?></td>
                                <td><?php echo htmlspecialchars($result['category']); ?></td>
                                <td><?php echo htmlspecialchars($result['numberOfReservation']); ?> person</td>
                                <td>
                                    <form action="../../includes/admin_dashboard_remove_services.inc.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this restaurant?');">
                                        <input type="hidden" name="restaurant_id" value="<?php echo $result['restaurant_id']; ?>">
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No Restaurant Services found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
