<?php
declare(strict_types=1);


require_once __DIR__ . '/../models/rest_dashboard_model.php';
function display_read_rests(object $pdo, int $userID): void {
    $result = read_rest($pdo, $userID);
    if ($result && count($result) > 0) {
        foreach ($result as $row) {
            echo '<div class="box">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_data_one']) . '" alt="' . htmlspecialchars($row['img_url']) . '">';
            echo '<div class="info">';
            echo '<p><span>Name: </span>' . htmlspecialchars((string)$row['name']) . '</p>';
            echo '<p><span>Address: </span>' . htmlspecialchars((string)$row['address']) . '</p>';
            echo '<p><span>Category: </span>' . htmlspecialchars((string)$row['category']) . '</p>';
            echo '<p><span>menu: </span>' . htmlspecialchars((string)$row['menu_url']) . '</p>';
            echo '</div>';
            echo '<div class="reserve">';
            echo '<a class="button" href="edit_rest.php?ID={'.$row['restaurant_id'].'}\">Edit</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No Record Found for this User.";
    }
}
