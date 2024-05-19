<?php

declare(strict_types=1);


// check if one input is empty or not
function is_input_empty(string $username ,string $password):bool
{
    if(empty($username) || empty($password)){
        return true;
    }else{
        return false;
    }
}

// if the result has a value will fetch a array and if not will return a boolean so we can bind two data types togather
function is_username_wrong(bool | array $result ){
    if(!$result){
        return true;
    }else{
        return false;
    }
}



function is_password_wrong(string $password , string  $hashpassword){
    if(!password_verify($password , $hashpassword)){
        return true;
    }else{
        return false;
    }
}