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
    <title>Favorite</title>
    <link rel="stylesheet" type="text/css" href="css/users.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
        img {
            display: block;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="sidebar">
        <?php include 'views/user_dashboad/user_dashboard.php';?>
    </div>
    <div class="content" style ="margin-left:250px">
        <h4>Your  Wishlist</h4>
        <?php
            $result = get_car_from_wishlist($pdo, $userId);
            if ($result): ?>
             <h4>Your Favorite Cars</h4>
            <table>
                <tr>
                    <th>service picture</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Rental Price</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($result as $item): ?>
                    <tr>
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($item['imagedata']) ?>" alt="<?= htmlspecialchars($item['main_image']) ?>"></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['brand']) ?></td>
                        <td><?= htmlspecialchars($item['rental_price']) ?> JOD</td>
                        <td>
                            <form action="includes/wishlist.inc.php" method="post">
                                <input type="hidden" name="car_id" value="<?= htmlspecialchars($item['id']) ?>">
                                <button type="submit" name="remove">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
         
        <?php endif; ?>

       
        <?php
$result = get_guids_from_wishlist($pdo, $userId);
if ($result): ?>
 <h4>Your Favorite Guides</h4>
    <table>
        <tr>
            <th>Service Picture</th>
            <th>Name</th>
            <th>Languages</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $item): ?>
            <tr>
                <td>
                    <?php if (!empty($item['img_data'])): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($item['img_data']) ?>" alt="<?= htmlspecialchars($item['img']) ?>" width="100" height="100">
                    <?php else: ?>
                        <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['guid_name']) ?>" width="100" height="100">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($item['guid_name']) ?></td>
                <td><?= htmlspecialchars($item['languages']) ?></td>
                <td><?= htmlspecialchars($item['rating']) ?> / 5</td>
                <td>
                    <form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="guid_id" value="<?= htmlspecialchars($item['guid_id']) ?>">
                        <button type="submit" name="remove">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
  
<?php endif; ?>



<?php
$result = get_rest_from_wishlist($pdo, $userId);
if ($result): ?>
<h4>Your Favorite Restaurants</h4>
    <table>
        <tr>
            <th>Service Picture</th>
            <th>Name</th>
            <th>Category</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $item): ?>
            <tr>
                <td>
                    <?php if (!empty($item['image_data_one'])): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($item['image_data_one']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="100" height="100">
                    <?php else: ?>
                        <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="100" height="100">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['category']) ?></td>
                <td><?= htmlspecialchars($item['rating']) ?> / 5</td>
                <td>
                    <form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="restaurant_id" value="<?= htmlspecialchars($item['restaurant_id']) ?>">
                        <button type="submit" name="remove">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
   
<?php endif; ?>


<?php
$result = get_hotel_from_wishlist($pdo, $userId);
if ($result): ?>
    <h4>Your Favorite Hotels</h4>
    <table>
        <tr>
            <th>Service Picture</th>
            <th>Name</th>
            <th>City</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $item): ?>
            <tr>
                <td>
                    <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="100" height="100">
                </td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['city']) ?></td>
                <td><?= htmlspecialchars($item['rating']) ?> / 5</td>
                <td>
                    <form action="includes/wishlist.inc.php" method="post">
                        <input type="hidden" name="hotel_id" value="<?= htmlspecialchars($item['hotel_id']) ?>">
                        <button type="submit" name="remove">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No items in your wishlist.</p>
<?php endif; ?>

</div>
</body>
</html>
