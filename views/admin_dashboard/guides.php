<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../../models/admin_dashboard_model.php';



if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['search_guide'])) {
    $name = $_GET['search_guide'];
    $guides = search_guides_by_name($pdo, $name) ;
} else {
    $guides = get_guides($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Guides</title>
</head>
<body>
    <div class="page">
    <div class="sidebar">
        <?php include 'admin_dashboard.php'; ?>
    </div>
        <div class="content">                  
       
        <h1>Guides</h1>
        <div class="flex-container" >
                <form action="" method="GET" class="search_form" style="max-width:80%;">
                    <input type="text" name="search_guide" placeholder="Search by name">
                    <button type="submit">Search</button>
                </form>

                <form action="add_guide.php" method="POST">
                    <button class="add-button" type="submit">Add</button>
                </form>
                
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Personal image</th>
                        <th>Name</th>
                        <th>Experience</th>
                        <th>Email</th>
                        <th>Can Go</th>
                        <th>Languages</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($guides): ?>
                        <?php foreach ($guides as $result): ?>
                            <tr>
                                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($result['img_data']); ?>" alt="<?php echo htmlspecialchars($result['img']); ?>" class="guide-image "></td>
                                <td><?php echo htmlspecialchars($result['guid_name']); ?></td>
                                <td><?php echo htmlspecialchars($result['experience']); ?> years</td>
                                <td><?php echo htmlspecialchars($result['email']); ?></td>
                                <td><?php echo htmlspecialchars($result['can_go']); ?></td>
                                <td><?php echo htmlspecialchars($result['languages']); ?></td>
                                <td><?php echo htmlspecialchars($result['rating']); ?></td>
                                <td>
                                <a class="edit-button" href="edit_guide.php?ID=<?php echo $result['guid_id']; ?>" style="margin:5px">Edit</a>
                                    <form action="../../includes/admin_dashboard_delete_guide.inc.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="guide_id" value="<?php echo $result['guid_id']; ?>">
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No Guides.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
