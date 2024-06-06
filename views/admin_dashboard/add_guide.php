 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Guide</title>
</head>
<body>
    <form action="../../includes/admin_dashboard_add_giude.inc.php" method="POST" enctype="multipart/form-data">
        <label for="name">Guide name</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>

        <label for="experience">Experience</label>
        <input type="text" id="experience" name="experience" required><br>

        <label for="language">Languages</label>
        <input type="text" id="language" name="language" required><br>

        <label for="can_go">Can go</label>
        <input type="text" id="can_go" name="can_go" required><br>
        
        <label for="photo">Personal photo</label>
        <input type="file" name="photo" id="photo" required><br>
        <input type="submit" value="ADD">
    </form>
</body>
</html>

</html>