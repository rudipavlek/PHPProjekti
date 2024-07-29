<?php

class Login extends Dbh{

    private $username;
    private $pwd;
    

    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        try{

        require_once 'Dbh.php';
        require_once '../includes/login_model.inc.php';
        require_once '../includes/login_contr.inc.php';

        if (file_exists('../includes/profil.inc.php')) {
            echo "bla";
            die();
        } else {
            echo "bla2";
            die();
        }


        $errors = [];

        if(is_input_empty($this->username, $this->pwd)){
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($this->connect(), $this->username);

        if(is_username_wrong($result)){
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        if(!is_username_wrong($result) && is_password_wrong($this->pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info!";
        }


        require_once '../includes/config_session.inc.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $newSessioId = session_create_id();
        $sessionId = $newSessioId . "_" . $result["user_id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION['last_generation'] = time();

        header("Location: ../indexLogiran.php");

        die();

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }
}

