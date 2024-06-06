<?php
// this file for what user inter data and we will do some thing in it

// to prevent any wrong data type  to pass
declare(strict_types = 1 );

// check if one input is empty or not
function is_input_empty(string $username ,string $password,string $con_password , string $email ,string $role):bool
{
    if(empty($username) || empty($password)|| empty($con_password) || empty($email) || empty($role)){
        return true;
    }else{
        return false;
    }
}


//chaeck if the email is not valide
function is_email_invalid(string  $email ):bool
{
    if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

//chaeck if the username already exists 
function is_username_taken(object $pdo,string $username ):bool
{
    if(get_username( $pdo , $username)){
        return true;// error if the username taken
    }else{
        return false;
    }
}


//chaeck if the email already exists 
function is_email_registered(object $pdo,string $email ):bool
{
    if(get_email( $pdo , $email)){
        return true;// error if the email exists
    }else{
        return false;
    }
}

//chaeck length of the password 
function is_password_length_valide(object $pdo,string $password ):bool
{
    if(get_password( $pdo , $password) > 10){
        return true;// error if the length of password is lower than 10
    }else{
        return false;
    }
}

//check if confirm password as well as password
function is_password_as_confirm(string $password, string $con_password): bool {
    if($password !=$con_password ){
        return true;
    }else{
        return false;
    }
}


//created one

function create_user(object $pdo ,string $username, string $password , string $con_password , string $email , string $role){
    set_user( $pdo,$username , $password , $con_password ,  $email ,  $role);
}