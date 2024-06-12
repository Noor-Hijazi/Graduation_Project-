<?php
session_start();
require '../../includes/db.inc.php';
require_once '../../models/user_dashboard_model.php';

$userId = $_SESSION["user_id"];

$result = get_info_user($pdo, $userId);
$car_rentals = get_rental_car($pdo, $userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    update_user_details($pdo, $userId, $new_name, $new_email);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

function update_user_details($pdo, $userID, $new_name, $new_email) {
    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->execute([$new_name, $new_email, $userID]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($_SESSION["user_username"]) . " Dashboard"; ?></title>
    <link rel="stylesheet" type="text/css" href="../../css/users.css">
</head>
<style>
 body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    display: flex;
    height: 100vh;
    overflow: hidden; /* Prevent body from scrolling */
}

/* Page Layout */
.page {
    display: flex;
    width: 100%;
    min-height: 100vh;
    box-sizing: border-box;
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 20px;
    box-sizing: border-box;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: auto; /* Allow sidebar to scroll if content overflows */
}

.sidebar h2 {
    color: #ecf0f1;
    margin-bottom: 20px;
    text-align: center;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    color: #ecf0f1;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

/* Content Area */
.content {
    flex-grow: 1; /* Ensures content takes up remaining space */
    padding: 20px;
    background-color: #fff;
    margin-left: 250px; /* Ensure content is beside the sidebar */
    overflow-y: auto; /* Allow content to scroll if it overflows */
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}

.content-inner {
    flex-grow: 1; /* Ensures inner content takes up all available space */
    display: flex;
    flex-direction: column;
}

/* Headings */
h1, h2, h3 {
    color: #34495e;
    margin-top: 0; /* Add consistent margin top */
}

/* Paragraph Styling */
p {
    color: #7f8c8d;
    line-height: 1.6;
}

/* Sections Styling */
.welcome, .edit-info, .car-rentals {
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Edit Info Form */
.edit-info form {
    display: flex;
    flex-direction: column;
    width: 100%; /* Make the form responsive */
    max-width: 500px; /* Limit the form width */
}

.edit-info label {
    margin-top: 10px;
    font-weight: bold; /* Improve label visibility */
}

.edit-info input {
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #bdc3c7;
    border-radius: 4px;
    font-size: 14px;
}

.edit-info button {
    padding: 10px;
    background-color: #2980b9;
    color: #fff;
    border: none;
    border-radius: 4px;
    margin-top: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.edit-info button:hover {
    background-color: #3498db;
}

/* Car Rentals */
.car-rentals {
    flex-grow: 1; /* Allow car rentals to grow and fill available space */
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap */
    gap: 20px;
}

.car-rental {
    flex: 1 1 300px; /* Ensure each car rental box is responsive */
    background-color: #fff;
    padding: 0px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.car-rental p {
    margin: 5px 0;
}

.car-image {
    max-width: 50%; /* Make the image responsive */
    height: auto;
    border-radius: 8px;
    margin-top: 10px;
}

/* Cancel Button */
.cancel-btn {
    padding: 10px;
    background-color: #e74c3c;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.cancel-btn:hover {
    background-color: #c0392b;
}

/* Responsive Styling */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }

    .content {
        margin-left: 0;
        padding: 10px;
    }

    .edit-info form {
        width: 100%;
    }

    .car-rentals {
        flex-direction: column;
        align-items: center;
    }

    .car-rental {
        flex: 1 1 auto;
        width: 100%;
    }
}
</style>
<body>
    <div class="page">
    <div class="sidebar">
        <?php include 'user_dashboard.php';?>
    </div>
        <div class="content">
            <div class="welcome">
                <h3>Welcome, <?php echo htmlspecialchars($result['username']); ?></h3>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($result['email']); ?></p>
                <p><strong>Joined at:</strong> <?php echo htmlspecialchars($result['created_at']); ?></p>
            </div>

            <div class="edit-info">
                <h2>Edit Your Information</h2>
                <form method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($result['username']); ?>" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($result['email']); ?>" required>
                    <button type="submit">Save Changes</button>
                </form>
            </div>

            <?php if ($car_rentals): ?>
                <div class="car-rentals">
                    <h2>You Can  Rentals Car</h2>
                    <?php foreach ($car_rentals as $car_rental): ?>
                        <div class="car-rental">
                            <p><strong>Driver License:</strong></p>
                            <?php if (isset($car_rental['image_data']) && isset($car_rental['filename'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($car_rental['image_data']); ?>" alt="<?php echo htmlspecialchars($car_rental['filename']); ?>" class="car-image">
                            <?php else: ?>
                                <p>No Driver License available.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
