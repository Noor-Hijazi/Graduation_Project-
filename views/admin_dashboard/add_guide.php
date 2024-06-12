<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/services.css">
    <title>Add Guide</title>
    <style>


        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] ,
        input[ type="number"]{
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="file"]:focus,
        input[ type="number"]:focus{

            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="page">
    <div class="sidebar">
        <?php include 'admin_dashboard.php'; ?>

    </div>
    <div class="content">
    <form action="../../includes/admin_dashboard_add_giude.inc.php" method="POST" enctype="multipart/form-data">
    <label for="name">Guide name</label>
<input type="text" id="name" name="name" required placeholder="Enter guide name"><br>

<label for="email">Email</label>
<input type="email" id="email" name="email" required placeholder="Enter email"><br>

<label for="experience">Experience</label>
<input type="number" id="experience" name="experience" required placeholder="Enter experience (in years)"><br>

<label for="language">Languages</label>
<input type="text" id="language" name="language" required placeholder="Enter languages spoken"><br>

<label for="can_go">Can go</label>
<input type="text" id="can_go" name="can_go" required placeholder="Enter places guide can go"><br>

<label for="photo">Personal photo</label>
<input type="file" name="photo" id="photo" required><br>

<input type="submit" value="ADD">

    </form>    </div></div>
</body>
</html>
