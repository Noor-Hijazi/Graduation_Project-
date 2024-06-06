<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';

$companies =read_undo_companies( $pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Compaines</title>
</head>
<body>
<div class="page">
        <div class="content">
            <?php if ($companies ): ?>
                <?php foreach ($companies  as $result): ?>
                    <h3>HI <?php echo $_SESSION["user_username"] ; ?></h3>
                    <br><br>
                    <p>name: <?php echo htmlspecialchars($result['username']); ?></p>
                    <p>Email: <?php echo htmlspecialchars($result['email']); ?></p>
                    <p>created at: <?php echo htmlspecialchars($result['created_at']); ?></p>
                    <p>Catagory: <?php echo htmlspecialchars($result['role']); ?></p>

                        <form action="../../includes/admin_dashbord_undo.inc.php" method="POST">
                        <input type="text" name="userId" value="<?php echo $result['id']; ?>">
                        <button type="submit">undo</button>
                     
                    </form>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No user in trash.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
