<?php
declare(strict_types=1);


require_once __DIR__ . '/../models/rest_dashboard_model.php';
function display_read_rests(object $pdo, int $userID): void {
    $result = read_rest($pdo, $userID);
    if ($result && count($result) > 0) {
        echo '<table class="styled-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Image</th>';
        echo '<th>Name</th>';
        echo '<th>Address</th>';
        echo '<th>Category</th>';
        echo '<th>Menu</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($result as $row) {
            echo '<tr>';
            
            if (!empty($row['image_data_one'])) {
                // Display the image using base64 encoding
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image_data_one']) . '" alt="' . htmlspecialchars($row['image_url'] ?? 'Image') . '" class="restaurant-image" /></td>';
            } else {
                // Fallback to the URL-based image
                echo '<td><img src="' . htmlspecialchars($row['image_url'] ?? 'placeholder.jpg', ENT_QUOTES, 'UTF-8') . '" alt="Image not found" class="restaurant-image" /></td>';
            }
    
            echo '<td>' . htmlspecialchars($row['name'] ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($row['address'] ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($row['category'] ?? 'N/A') . '</td>';
            echo '<td><a href="' . htmlspecialchars($row['menu_url'] ?? '#', ENT_QUOTES, 'UTF-8') . '" target="_blank">View Menu</a></td>';
            echo '<td><a class="button" href="edit_rest.php?ID=' . htmlspecialchars((string)($row['restaurant_id'] ?? ''), ENT_QUOTES, 'UTF-8') . '">Edit</a>
            
            
            </td>';
            
          
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No Record Found for this User.";
    }
}
