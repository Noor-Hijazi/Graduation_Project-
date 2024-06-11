<?php
declare(strict_types=1);

// to read all the companies that is regestered 
// edit isdeleted =0 AND != user
function read_companies(object $pdo): array {
    $query = "SELECT * FROM users WHERE isDeleted = 0 AND role NOT IN ('admin', 'user')";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


// read all cars for spicefic car company

function read_spicefic_car_company(object $pdo, int $userId) {
    $query = 'SELECT * FROM car WHERE id = :userId';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//remove a company  or user
function delete_company(object $pdo ,int $userId ){
    $query = "UPDATE users SET isDeleted = 1 WHERE id = :userId";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        //this to check effective rows
        return $stmt->rowCount() > 0;
    }
    
    return false;
}
//read undo companies
function read_undo_companies(object $pdo) {
    $query = "SELECT * FROM users WHERE isDeleted = 1 AND role != 'admin' ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//undo the company or user

function undo_company(object $pdo ,int $userId ){
    $query = "UPDATE users SET isDeleted = 0 WHERE id = :userId";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        //this to check effective rows
        return $stmt->rowCount() > 0;
    }
    
    return false;
}


// add new company

// function add_user(object $pdo,string $username , string $email , string $role){
//     $query = "INSERT INTO users (username, pwd, pwdcon, email, role) VALUES (:username, '12345678910', '12345678910', :email, :role)";
//     $stmt = $pdo->prepare($query);
//     // the time will doing the hashing and this will prevent the Brute force Attack
//     $options = [
//         'cost' => 12
//     ];

//     //hashing the passwordes
//     $hashedPwd = password_hash('12345678910' ,PASSWORD_BCRYPT ,$options);
//     $hashedPwdcon = password_hash('12345678910' ,PASSWORD_BCRYPT ,$options);


//     $stmt->bindParam(":username" , $username);
//     $stmt->bindParam(":email" , $email);
//     $stmt->bindParam(":role" , $role);
  
//     $stmt->execute();
// }


// read the users 
global $userId ;


function read_users(object $pdo): array {
    global $userId;
    $query = "SELECT * FROM users WHERE isDeleted = 0 AND role = 'user'";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // For demonstration purposes, we're just setting the first user's ID to the global variable.
    if (!empty($users)) {
        $userId = $users[0]['id'];
    }
    
    return $users;
}

function get_driving_license(object $pdo){
    global $userId ;
    $query = "SELECT filename, image_data FROM car_rental WHERE userID = :userId";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $license = $stmt->fetch(PDO::FETCH_ASSOC);
    return $license ? $license : null;
}




// get all guides in our website 

function get_guides(object $pdo ){
    $query  = 'SELECT * FROM guids WHERE isDeleted = 0 ;';

    $stmt = $pdo->prepare($query);

    $stmt->execute();
    $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $guides;
}


// to edit the guides
function insert_into_guid($pdo, $name, $email, $experience, $language, $can_go, $photoName, $imageData) {
    $query = 'INSERT INTO guids (languages, experience, guid_name, img, img_data ,email,can_go) VALUES (:languages, :experiences, :guid_name, :img, :img_data ,:email,:can_go)';
    

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':languages', $language, PDO::PARAM_STR);

        $stmt->bindParam(':experiences', $experience, PDO::PARAM_STR);
        $stmt->bindParam(':guid_name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':img', $photoName, PDO::PARAM_STR);
        $stmt->bindParam(':img_data', $imageData, PDO::PARAM_LOB);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':can_go', $can_go, PDO::PARAM_STR);
        $stmt->execute();
  
}


//get the spcefic guide information
 function get_guide_info(object $pdo, int $guide_id) {
    $query  = 'SELECT * FROM guids WHERE isDeleted = 0 AND guid_id = :guide_id;';

    $stmt = $pdo->prepare($query);

    // Bind the parameter
    $stmt->bindParam(':guide_id', $guide_id, PDO::PARAM_INT);

    $stmt->execute();
    $guides = $stmt->fetch(PDO::FETCH_ASSOC);
    return $guides;
}


//to edit for spcefic guide
function update_guide_info(object $pdo, int $guide_id, string $name, string $email, int $experience, string $language, string $can_go,$rating) {
    $query = 'UPDATE guids 
              SET guid_name = :name, 
                  email = :email, 
                  experience = :experience, 
                  languages = :language, 
                  can_go = :can_go ,
                  rating =:rating
              WHERE guid_id = :guide_id';

    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':experience', $experience, PDO::PARAM_INT);
    $stmt->bindParam(':language', $language, PDO::PARAM_STR);
    $stmt->bindParam(':can_go', $can_go, PDO::PARAM_STR);
    $stmt->bindParam(':guide_id', $guide_id, PDO::PARAM_INT);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();
}
////to delete for spcefic guide
function delete_guide_info(object $pdo, int $guide_id) {
    $query = 'UPDATE guids SET isDeleted = 1 WHERE guid_id = :guide_id';

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':guide_id', $guide_id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();
}



//read all service 



function read_car_services(object $pdo){
    $query = "SELECT c.*, cd.number_of_car, cd.update_number
    FROM car AS c
    INNER JOIN car_detail AS cd ON c.id = cd.carID
    WHERE c.isDeleted = 0;
    
    ";
    $stmt = $pdo->query($query);

    if ($stmt) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } else {
        // Log or handle the query error
        die("Query Failed: " . $pdo->errorInfo());
    }
}


function read_rest_services(object $pdo){
    $query = " SELECT * FROM restaurants ";
    $stmt = $pdo->query($query);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}



// to remove the spicefic service
function remove_car(object $pdo, int $carId){
    $query ='UPDATE car SET isDeleted = 1 WHERE id = :carId';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
    $stmt->execute();
}


function remove_rest(object $pdo, int $restId){
    $query ='DELETE FROM restaurants WHERE restaurant_id = :restId';
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':restId', $restId, PDO::PARAM_INT);
    $stmt->execute();
}


// searching by company name
function search_company_by_name($pdo, $name) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE  isDeleted = 0 AND role NOT IN ('admin', 'user') AND username LIKE :name");
    $stmt->execute(['name' => '%' . $name . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//searching for users 
function search_users_by_name($pdo, $name) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE role = 'user' AND isDeleted = 0 AND username LIKE :name");
    $stmt->execute([':name' => '%' . $name . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function search_All_users_by_name($pdo, $name) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE  isDeleted = 1 AND username LIKE :name");
    $stmt->execute([':name' => '%' . $name . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//searching for cars 
function search_car_by_name($pdo, $name) {
    $stmt = $pdo->prepare("SELECT c.*, cd.number_of_car, cd.update_number
                           FROM car AS c
                           INNER JOIN car_detail AS cd ON c.id = cd.carID
                           WHERE c.name LIKE :name AND c.isDeleted = 0");
    $stmt->execute(['name' => '%' . $name . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//  searching by name for guides 
function search_guides_by_name($pdo, $name) {
    $stmt = $pdo->prepare("SELECT * FROM guids WHERE  isDeleted = 0 AND guid_name LIKE :name");
    $stmt->execute([':name' => '%' . $name . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function search_rest_by_name($pdo, $name) {
    $stmt = $pdo->prepare("SELECT * FROM restaurants WHERE   name LIKE :name");
    $stmt->execute([':name' => '%' . $name . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




// for static 

function read_car_companies(object $pdo): array {
    $query = "SELECT * FROM car where isDeleted =0 ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function read_rest_companies(object $pdo): array {
    $query = "SELECT * FROM restaurants";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function read_hotel_companies(object $pdo): array {
    $query = "SELECT * FROM hotels";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


//read the admin 

function read_company_admin($pdo, $userID) {
    $query = "SELECT * FROM users WHERE isDeleted = 0 AND role = 'admin' AND id = :userID";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}