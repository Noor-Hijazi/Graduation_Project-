<?php

declare(strict_types=1);
require_once '../../includes/db.inc.php';
require '../../models/rest_dashboard_model.php';

if (isset($_GET['ID'])) {
    $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslashes to get just the id 
    $restId = (int)$id;
    $result = get_rest_detail($pdo, $restId);
} else {
    echo '<p>No ID provided.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant</title>
</head>
<body>
   <?php if ($result) { ?>
    <h1>Edit Restaurant</h1>
    <form action="../../includes/rest_dashboard_edit.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="restId" value="<?php echo $restId; ?>">
      
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image_data_one']) . '" alt="' . htmlspecialchars($result['img_url']) . '">';?>
       
        <input type="file" name="image" id="image">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($result['name']); ?>"><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($result['address']); ?>"><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($result['category']); ?>"><br>
        <label for="menu_url">Menu URL:</label>
        <input type="text" id="menu_url" name="menu_url" value="<?php echo htmlspecialchars($result['menu_url']); ?>"><br>
        <button type="submit">Update</button>
    </form>  
   <?php } else {
       echo 'Cannot read the restaurant details!';
   } ?>
</body>
</html>

</body>
</html>



