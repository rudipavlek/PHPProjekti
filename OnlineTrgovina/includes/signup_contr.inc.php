<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email){
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }else{
        return false;
    }
}

function is_email_invalid(string $email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }else{
        return true;
    } 

}

function is_username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)){
        return true;
    }else{
        return false;
    } 

}

function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    } 

}

function create_user(object $pdo, string $username, string $pwd, string $email, string $first_name, string $last_name, string $address, string $city, string $postal_code, string $country, string $phone){
    
    set_user($pdo, $username, $pwd, $email, $first_name, $last_name, $address, $city, $postal_code, $country, $phone);

}