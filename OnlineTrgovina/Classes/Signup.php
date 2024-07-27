<?php

class Signup extends Dbh{

    private $username;
    private $pwd;
    private $email;


    public function __constructor($username, $pwd, $email){
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;
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
            if(is_username_taken($this->pdo, $this->username)){
                $errors["username_taken"] = "Username is already taken!";
            }
            if(is_email_registered($this->pdo, $this->email)){
                $errors["email_used"] = "Email is already taken!";
            }
    
    
    
            require_once '../includes/config_session.inc.php';
    
            if($errors){
                $_SESSION["errors_signup"] = $errors;
                header("Location: ../index.php");
                die();
            }
    
            create_user($this->pdo, $this->username, $this->pwd, $this->email);
            header("Location: ../index.php?signup=success");
    
            $pdo = null;
            $stmt = null;
            die();
    
        } catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    }
}

