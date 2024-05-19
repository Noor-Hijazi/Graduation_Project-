<?php
//this file to interact with database

// to prevent any wrong data type  to pass
declare(strict_types = 1 );



// to get the username from database
function get_username(object $pdo , string $username){
        $query ="SELECT username FROM users WHERE username = :username;";

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



// to get the email  from database
function get_email(object $pdo , string $email){
    $query ="SELECT email FROM users WHERE email = :email;";

    // to make the query secure -> prevent sql injection    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email" , $email);
    $stmt->execute();

    // to grab the data row 
    // fetch one piece of data from database
    //FETCH_ASSOC -> means fetch the data as assocative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;

}





// to get the email  from database
function get_password(object $pdo ,string $password){
    $query ="SELECT pwd FROM users WHERE pwd = :pwd;";

    // to make the query secure -> prevent sql injection    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pwd" , $password);
    $stmt->execute();

    // to grab the data row 
    // fetch one piece of data from database
    //FETCH_ASSOC -> means fetch the data as assocative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;

}


// create user 

function set_user(object $pdo,string $username , string $password , string $con_password , string $email , string $role){
    $query ="INSERT INTO users (username , pwd , pwdcon , email , role)VALUES (:username , :pwd ,:pwdcon , :email , :role)";
    $stmt = $pdo->prepare($query);
    // the time will doing the hashing and this will prevent the Brute force Attack
    $options = [
        'cost' => 12
    ];

    //hashing the passwordes
    $hashedPwd = password_hash($password ,PASSWORD_BCRYPT ,$options);
    $hashedPwdcon = password_hash($con_password ,PASSWORD_BCRYPT ,$options);


    $stmt->bindParam(":username" , $username);
    $stmt->bindParam(":pwd" ,$hashedPwd);
    $stmt->bindParam(":pwdcon" ,$hashedPwdcon);
    $stmt->bindParam(":email" , $email);
    $stmt->bindParam(":role" , $role);
  
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}
