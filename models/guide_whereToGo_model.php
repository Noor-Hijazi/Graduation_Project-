<?php

function amman_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
    FROM guids
    LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
    WHERE LOWER(guids.can_go) LIKE "%amman%"
    GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}
function irbid_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
             WHERE LOWER(guids.can_go) LIKE "%irbid%"

            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}
function mafraq_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
            WHERE LOWER(guids.can_go) LIKE "%mafraq%"
           
            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}
function petra_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id
                         WHERE LOWER(guids.can_go) LIKE "%petra%"

            
            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}

function maan_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
            
             WHERE LOWER(guids.can_go) LIKE "%maan%"

            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}
function aqaba_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
          
             WHERE LOWER(guids.can_go) LIKE "%Alqupa%"
            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}
function alkerak_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
            
            WHERE LOWER(guids.can_go) LIKE "%kerak%"
            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}
function ajloun_guides($pdo){
    // Corrected SQL query
    $sql = 'SELECT guids.*, AVG(guid_ratings.rating) AS average_rating
            FROM guids
            LEFT JOIN guid_ratings ON guids.guid_id = guid_ratings.guid_id 
           
             WHERE LOWER(guids.can_go) LIKE "%ajloun%"
            GROUP BY guids.guid_id';

    // Prepare and execute the query
    $stmt = $pdo->query($sql);

    // Fetch the results
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $guides;
}

