<?php
//this file for display desgin

// to prevent any wrong data type  to pass
declare(strict_types = 1 );

// to save all the values if we have errors
function inputes()
{
    
if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["username_taken"])){
    echo '    
    <div>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="'.$_SESSION["signup_data"]["username"].'" >
    </div>
';
}else{
    echo'
    <div>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" >
    </div>
    ';
}
if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_used"])&&!isset($_SESSION["error_signup"]["invalid_email"]) ){
    echo'
    <div>
    <label for="email">email:</label>
    <input type="email" id="email" name="email" value="'.$_SESSION["signup_data"]["email"].'" >
    </div>
    ';
}else{
    echo'
    <div>
    <label for="email">email:</label>
    <input type="email" id="email" name="email" >
    </div>
    ';
}
echo'
    <div>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" >
    </div>
    <div>
    <label for="con_password">Confirm Password:</label>
    <input type="password" id="con_password" name="con_password" >
    </div>
';

if(isset($_SESSION["signup_data"]["role"])){
    $currentRole = $_SESSION["signup_data"]["role"];//selected  role 

        echo '<div>
            <label for="role">Role</label>
            <select id="role" name="role">';

    $roleArray = ['user' ,'admin' ,'car','rest','hotel'];

    foreach ($roleArray as $role) {// role from array 
         echo '<option value="' . $role . '"';
         if($role === $currentRole){
            echo ' selected';
         }
         echo '>'.$role.'</option>';
    }
        echo '</select>';
        echo '</div>';
}else{
    echo '
    <label for="role">Role </label>
    <select id="role" name="role">
        <option value="user">As User</option>
        <option value="admin">As Admin</option>
        <option value="car"> As Car Rental Office</option>
        <option value="rest"> As Resturent</option>
        <option value="hotel"> As Hotel</option>
    </select>
    
    
    ';
}
}



function  check_signup_errors(){
    if(isset( $_SESSION["error_signup"] )){
        //this is array
        $errors = $_SESSION["error_signup"];

        echo "<br>";
        foreach($errors as $error){
            echo '<p class="redpara">'.$error.'</p>';
        }

        unset($_SESSION["error_signup"]);
    }

       else if(isset($_GET['signup'])&& $_GET['signup'] === "success"){
        echo '<br>';
        echo '<p>Signup Success</p>';
    }
}