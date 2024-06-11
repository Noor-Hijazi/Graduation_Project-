<?php
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

// Check if 'ID' parameter is provided in the URL
if (isset($_GET['ID'])) {
    $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslashes to get just the id 

    // Convert the ID to an integer for safe use
    $guide_id = (int)$id;

    // Function from the model to get guide info
    $info = get_guide_info($pdo, $guide_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Edit Guide</title>
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
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="file"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="file"]:focus,
        input[type="number"]:focus {
            outline: none;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'admin_dashboard.php'; ?>
        </div>
        <div class="content">
            <?php if ($info) { ?>
            <form action="../../includes/admin_dashbord_guide.inc.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="guid_id" name="guid_id" value="<?php echo htmlspecialchars($info['guid_id'], ENT_QUOTES, 'UTF-8'); ?>"><br>

                <label for="name">Guide name</label>            
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($info['guid_name'], ENT_QUOTES, 'UTF-8'); ?>" required><br>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($info['email'], ENT_QUOTES, 'UTF-8'); ?>" required><br>

                <label for="experience">Experience</label>
                <input type="number" id="experience" name="experience" value="<?php echo htmlspecialchars($info['experience'], ENT_QUOTES, 'UTF-8'); ?>" required><br>

                <label for="language">Languages</label>
                <input type="text" id="language" name="language" value="<?php echo htmlspecialchars($info['languages'], ENT_QUOTES, 'UTF-8'); ?>" required><br>

                <label for="can_go">Can go</label>
                <input type="text" id="can_go" name="can_go" value="<?php echo htmlspecialchars($info['can_go'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
                
                <label for="rating">Rating</label>
                <input type="text" id="rating" name="rating" value="<?php echo htmlspecialchars($info['rating'], ENT_QUOTES, 'UTF-8'); ?>" required><br>

                <input type="submit" value="Save">
            </form>
            <?php } else { ?>
                <p>No guide information found.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
