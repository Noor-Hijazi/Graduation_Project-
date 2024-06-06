<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';


$guides = get_guides($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Guides</title>
</head>
<body>
    <div class="page">
        <div class="content">                  
            <h3>HI <?php echo $_SESSION["user_username"]; ?></h3>
            <form action="add_guide.php" method="POST">
                <button type="submit">add</button>
            </form>
            <?php if ($guides): ?>
                <?php foreach ($guides as $result): ?>

                    <img src="data:image/jpeg;base64,<?php echo base64_encode($result['img_data']); ?>" alt="<?php echo htmlspecialchars($result['img']); ?>">

                    <br><br>
                    <p>name: <?php echo htmlspecialchars($result['guid_name']); ?></p>
                    <p>experience: <?php echo htmlspecialchars($result['experience']); ?> years</p>
                    <p>email: <?php echo htmlspecialchars($result['email']); ?></p>
                    <p>can_go: <?php echo htmlspecialchars($result['can_go']); ?></p>
                    <p>can speak languages: <?php echo htmlspecialchars($result['languages']); ?></p>
                    <!-- Edit link -->
                    <a href="edit_guide.php?ID=<?php echo $result['guid_id']; ?>">Edit</a>
                    <!-- Edit form -->
                    <form action="../../includes/admin_dashboard_delete_guide.inc.php" method="POST">
                        <input type="hidden" name="guide_id" value="<?php echo $result['guid_id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                <?php endforeach; ?> 
            <?php else: ?>
                <p>No Guides.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
