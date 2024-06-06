<?php
    session_start();
    require_once 'includes/db.inc.php';
    require_once 'models/wishlist_model.inc.php';
    $userId =  $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favrite</title>
</head>
<body>
    <?php
         $result = get_car_from_wishlist($pdo ,$userId );

         foreach ($result as $item): ?>
            <li>
                <img src="data:image/jpeg;base64,<?= base64_encode($item['imagedata']) ?>" alt="<?= htmlspecialchars($item['main_image']) ?>">
                <p>Name: <?= htmlspecialchars($item['name']) ?></p>
                <p>Brand: <?= htmlspecialchars($item['brand']) ?></p>
                <p>Rental Price: <?= htmlspecialchars($item['rental_price']) ?></p>
                
                <form action="includes/wishlist.inc.php" method="post">
                    <input type="hidden" name="car_id" value="<?php echo  $item['id'] ?>">
                    <button type="submit" name="remove">Remove from Wishlist</button>
                </form>
            </li>
        <?php endforeach; ?>


</form>


</body>
</html>
