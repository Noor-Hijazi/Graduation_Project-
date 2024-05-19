<?php
// to prevent any wrong data type  to pass
declare(strict_types = 1 ); 

// to insert the image in table 

// Insert image into the database
function insert_image($pdo,$location,$rating, $fileName, $imageData,$userID) {
    $stmt = $pdo->prepare("INSERT INTO user_experience (userID,location_name,expre,filename, image_data) VALUES (:userID,:location_name,:rating,:fileName, :imageData)");
   $stmt->bindParam(":userID", $userID);  
   $stmt->bindParam(":location_name",$location);
    $stmt->bindParam(":rating", $rating);
    $stmt->bindParam(":fileName", $fileName);
    $stmt->bindParam(':imageData', $imageData, PDO::PARAM_LOB); 
   
    $stmt->execute();
}


// to read the images 
function readImage(object $pdo){
   
    // Retrieve images from the database
    $stmt = $pdo->query("SELECT * FROM user_experience");
    $stmt->execute();

    // to grab the data row 
    // fetch one piece of data from database
    //FETCH_ASSOC -> means fetch the data as assocative array
    $result =$stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

