<?php
    require_once '../../includes/db.inc.php';
    require_once '../../models/admin_dashboard_model.php';
    // Check if 'ID' parameter is provided in the URL
    if (isset($_GET['ID'])) {
        $id = trim($_GET['ID'], '{}\\'); // Trim any curly braces and backslash to get just the id 

        // Convert the ID to an integer for safe use
        $guide_id = (int)$id;
        //function from model
        $info = get_guide_info( $pdo , $guide_id);
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guide</title>
</head>
<body>
    <form action="../../includes/admin_dashbord_guide.inc.php" method="POST" enctype="multipart/form-data">
       <?php if($info) { ?>
        <input type="hidden" id="guid_id" name="guid_id" value="<?php echo $info ['guid_id'] ;?>"><br>
        <label for="name">Guide name</label>
        <input type="text" id="name" name="name" value="<?php echo $info ['guid_name'] ;?>"><br>
        

        <label for="email">Email</label>
        <input type="email" id="email" name="email"value="<?php echo $info ['email'] ;?>"><br>

        <label for="experience">Experience</label>
        <input type="number" id="experience" name="experience" value="<?php echo $info ['experience'] ;?>"><br>

        <label for="language">Languages</label>
        <input type="text" id="language" name="language" value="<?php echo $info ['languages'] ;?>"><br>

        <label for="can_go">Can go</label>
        <input type="text" id="can_go" name="can_go" value="<?php echo  $info ['can_go'] ;?>"><br>
    
        <?php } ?>
        <input type="submit" value="Save">
    </form>
   <?php } ?>
</body>
</html>



