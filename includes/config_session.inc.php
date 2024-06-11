<?php

// we are sitting only use cookies and session strict mode prevent session fixation attacks.
// this is mandatory for sessions
ini_set('session.use_only_cookies' ,1);
ini_set('session.use_strict_mode' ,1);




 
//session security 

session_set_cookie_params([
    //lifetime => 1800 seconds of the session cookie
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    //ensures the cookie is only sent over HTTPS connections
    'secure' => true,
    //ensures the cookie is only accessible to the server (not JavaScript)(XSS) attacks.
    'httponly' => true

]);

//to session_regenerate_id to prevent 
//the attecker  to access to the session id to long time just for 30m

session_start();


//chaeck if user login or not
if(isset($_SESSION["user_id"])){
       // check if the session id is not regenerate
       if(!isset($_SESSION["last_regeneration"])){
        regenerate_session_id_loggedin();
    }else{
        // 60s * 30m=>30m
        // $interval = 60 * 30;
        $interval = 60 * 75;
        if(time() -  $_SESSION["last_regeneration"] >= $interval){
            regenerate_session_id_loggedin();
        }

}
//if not login 

}else{
    // check if the session id is not regenerate
    if(!isset($_SESSION["last_regeneration"])){
        regenerate_session_id();
    }else{
        // 60s * 30m=>30m
        $interval = 60 * 30;
        if(time() -  $_SESSION["last_regeneration"] >= $interval){
            regenerate_session_id();
        }

}

}

function regenerate_session_id(){
    session_regenerate_id(true);
    //timefor the server
    $_SESSION["last_regeneration"] = time();
}


function  regenerate_session_id_loggedin(){
    session_regenerate_id(true);

    $userId= $_SESSION["user_id"];
    $newSesstionId = session_create_id();
    $sessionId = $newSesstionId. "_" .  $userId;
    session_id( $sessionId );
    //timefor the server
    $_SESSION["last_regeneration"] = time();
}
