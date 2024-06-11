<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/hotel_dashboard_model.php';

$userID = $_SESSION["user_id"];
$userDetails = get_user_details($pdo, $userID);
$reservations = get_user_hotel_reservations($pdo, $userID);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    update_user_details($pdo, $userID, $new_name, $new_email);
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .content {
            padding: 20px;
            background-color: #fff;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 10px;
        }
        .para {
            padding: 10px;
        }
        .para p {
            padding: 5px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .info p span {
            font-weight: bold;
            color: #333;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include 'hotel_dashboad.php';?>
    </div>
    <div class="content">
       
        <div class="container">
            <div class="info">
                <?php if ($userDetails): ?>
                    <h1>Welcome, <?php echo htmlspecialchars($userDetails['username']); ?></h1>
                    <div class="para">
                    <p><span>Name: </span><?php echo htmlspecialchars($userDetails['username']); ?></p>
                    <p><span>Email: </span><?php echo htmlspecialchars($userDetails['email']); ?></p>
                    <p><span>Joined at: </span><?php echo htmlspecialchars($userDetails['created_at']); ?></p>
                    <p><span>Your Role : </span><?php echo strtoupper(htmlspecialchars($userDetails['role'])); ?></p>
                    </div>
                <?php else: ?>
                    <p>No information found.</p>
                <?php endif; ?>
            </div>
            <div class="form-container">
                <h2>Edit Details</h2>
                <form method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['username']); ?>" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userDetails['email']); ?>" required>
                    <input type="submit" value="Save Changes">
                </form>
            </div>
            
           

        </div>
    </div>
</body>
</html>
