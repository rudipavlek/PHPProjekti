<?php

class Signup extends Dbh{

    private $username;
    private $pwd;
    private $email;
    private $first_name;
    private $last_name;
    private $address;
    private $city;
    private $postal_code;
    private $country;
    private $phone;


    public function __construct($username, $pwd, $email, $first_name, $last_name, $address, $city, $postal_code, $country, $phone){
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->country = $country;
        $this->phone = $phone;
    }

    public function signupUser(){
        try {
            require_once '../includes/signup_model.inc.php';
            require_once '../includes/signup_contr.inc.php';
    
            //ERROR HANDLERS
    
            $errors = [];
    
            if(is_input_empty($this->username, $this->pwd, $this->email)){
                $errors["empty_input"] = "Fill in all fields!";
            }
    
            if(is_email_invalid($this->email)){
                $errors["invalid_email"] = "Invalid email used!";
            }
            if(is_username_taken($this->connect(), $this->username)){
                $errors["username_taken"] = "Username is already taken!";
            }
            if(is_email_registered($this->connect(), $this->email)){
                $errors["email_used"] = "Email is already taken!";
            }
    
            require_once '../includes/config_session.inc.php';
    
            if($errors){
                $_SESSION["errors_signup"] = $errors;
                header("Location: ../indexSignup.php");
                die();
            }
    
            create_user($this->connect(), $this->username, $this->pwd, $this->email, $this->first_name, $this->last_name, $this->address, $this->city, $this->postal_code, $this->country, $this->phone);
            header("Location: ../index.php?signup=success");
    
            die();
    
        } catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    }
}

