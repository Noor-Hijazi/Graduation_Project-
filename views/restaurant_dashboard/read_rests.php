<?php
session_start();
require_once '../../includes/db.inc.php';
require_once '../rest_veiw.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read Restaurant Details</title>
    <link rel="stylesheet" type="text/css" href="../../css/nav_dashboard.css">
</head>
<style>
   /* General Page Layout */
.page {
    display: flex;
    min-height: 100vh;
    gap: 20px;
    justify-content: space-between;
}

/* Sidebar Styles */
.sidebar {
    max-width: 250px;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #333;
    padding-top: 20px;
    height: 100%;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    padding: 2px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 10px;
}

.sidebar ul li a:hover {
    background-color: #555555;
}

/* Content Styles */
.content {
    flex-grow: 1;
    padding: 20px;
    margin-left: 270px; /* Aligns with sidebar width plus padding */
    margin-right: 20px;
    box-sizing: border-box;
}

/* Table Styles */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    font-family: 'Roboto', sans-serif;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #007bff;
    color: white;
    text-align: left;
}

.styled-table th, .styled-table td {
    padding: 12px 15px;
    text-align: center;
}

.styled-table tbody tr {
    border-bottom: 1px solid #ddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #007bff;
}

.styled-table tbody tr:hover {
    background-color: #ddd;
}

.styled-table img {
    max-width: 100px;
    height: auto;
    display: block;
    margin: 0 auto;
}

/* Button Styles */
.button {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
}

.button:hover {
    background-color: #0056b3;
}

/* Responsive Styles */
@media (max-width: 767px) {
    .page {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }

    .content {
        margin-left: 0;
        margin-right: 0;
    }

    .styled-table, .styled-table thead, .styled-table tbody, .styled-table th, .styled-table td, .styled-table tr {
        display: block;
    }

    .styled-table tr {
        margin-bottom: 15px;
    }

    .styled-table td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    .styled-table td:before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-weight: bold;
        text-align: left;
    }

    .styled-table img {
        max-width: 100%;
    }
}


</style>
<body>
    <div class="page">
        <div class="sidebar">
            <?php include 'rest_dashboard.php';?>
        </div>
   <div class="content">
    <?php
    if (isset($_SESSION["user_id"])) {
        $userID = $_SESSION["user_id"];
        display_read_rests($pdo, $userID);
    } else {
        echo "User ID is not set in session.";
    }
    ?> </div></div>
</body>
</html>
