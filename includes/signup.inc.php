<?php


if($_SERVER['REQUEST_METHOD'] === "POST"){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $con_password = $_POST['con_password'];
    $role = $_POST['role'] ;
    
    try{
        require_once 'db.inc.php';
        require_once 'signup-model.inc.php';
        require_once 'signup_contr.inc.php';

        // running error handlers
        $errors = [];

        // chaeck if the all inputs fill 
        if (is_input_empty($username, $password, $con_password, $email, $role)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        //check if email not  valide
        if(is_email_invalid( $email )){
            $errors["invalid_email"] = "Invalid email used !";
        }

        //chaeck if the username is already taken
        if(is_username_taken($pdo,$username )){
            $errors["username_taken"] = "username already taken!";
        }
           //chaeck if the email is already exists
        if(is_email_registered( $pdo, $email )){
            $errors["email_used"] = "email already registered!";
        }

       if(is_password_length_valide( $pdo,$password )) {
        $errors["pwd_length"] = "Password length is short!";
       }
       if(is_password_as_confirm($password , $con_password )){
        $errors["pwd_not_like_conPwd"] = "Passwords not matched!";
       }


       //Add to sesstion 

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["error_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" =>$email,
                "role" =>$role
            ]; 
            $_SESSION["signup_data"] = $signupData;
            header("Location:../signup.php");
            die();
        }


        // to create the users
        // here the role condetions if admain or user or company
       create_user($pdo , $username , $password , $con_password ,  $email , $role);
       header("Location:../login.php?signup=success");
       //closing 
       $pdo = null;
       $stmt =null;
       die();
       

    }catch(PDOException $e){
        die("Query Faild signup.inc : " . $e->getMessage());
    }

}else{
    // if not submit as post method go to the index page
    header("Location:../signup.php");
    die();
}