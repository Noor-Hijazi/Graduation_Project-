<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){

    $username = $_POST['username'];
    $password =  $_POST['password'];


    try{

        require_once 'db.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

         // running error handlers
         $errors = [];

         // chaeck if the all inputs fill 
         if (is_input_empty($username, $password)) {
             $errors["empty_input"] = "Fill in all fields!";
         }
 
        
         $result = get_user( $pdo,$username );

         if(is_username_wrong($result)){
            $errors["wrong_username"] = "The username is not correct";
         }
         if(!is_username_wrong($result)&&is_password_wrong($password,$result['pwd'])){
            
            $errors["wrong_username_password"] = "userame or passwordis not corecct";
         }
         require_once 'config_session.inc.php';

         if($errors){
             $_SESSION["error_login"] = $errors;
 
             header("Location:../login.php");
             die();
         }
         // for combine sessionid with userid 

         $newSesstionId = session_create_id();
         $sessionId = $newSesstionId . "_" .$result["id"];
         session_id( $sessionId );

         $_SESSION["user_id"] = $result["id"];
         $_SESSION["car_id"] = $result["id"];
         $_SESSION["user_username"] = htmlspecialchars( $result["username"]);

         $_SESSION["last_regeneration"] = time();


         // if the user login from car reservtion
         
         if (isset($_SESSION['redirect_url'])) {
            
            $redirect_url = $_SESSION['redirect_url'];
            
            // Clear the redirect URL from the session
            unset($_SESSION['redirect_url']);
            
            // Redirect to the intended URL
            header("Location: $redirect_url");
            $pdo= null;
            $stmt =null;
            die();
        }
            
            else {
            header("Location: ../index.php?login=success");
            $pdo= null;
            $stmt =null;
            die();
        }


    }catch(PDOException $e){
        die("Query Faild : " . $e->getMessage());
    }
}
else{
        // if not submit as post method go to the index page
        header("Location:../login.php");
        die();
}