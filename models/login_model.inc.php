<?php
declare(strict_types=1);
function get_user (object $pdo , string $username ){
$query ="SELECT * FROM users WHERE username = :username;";

// to make the query secure -> prevent sql injection    
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username" , $username);
$stmt->execute();

// to grab the data row 
// fetch one piece of data from database
//FETCH_ASSOC -> means fetch the data as assocative array
$result = $stmt->fetch(PDO::FETCH_ASSOC);

return $result;
}



