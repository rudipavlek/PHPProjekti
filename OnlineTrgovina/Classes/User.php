<?php
class User extends Dbh{

    private $username;
    

    public function __construct($username){
        $this->username = $username;
    }

    public function getInfo(){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/profil.inc.php';

        return get_info_user($this->connect(), $this->username);

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }

    public function updateProfile($first_name, $last_name, $email, $address, $city, $postal_code, $country, $phone){
        try{

        require_once 'Dbh.php';
        require_once __DIR__ . '/../includes/profil.inc.php';

        return update_user_profile($this->connect(), $first_name, $last_name, $email, $address, $city, $postal_code, $country, $phone);

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }

    public function updatePassword($old_password, $new_password){
        try{

            require_once '../includes/login_model.inc.php';
            require_once '../includes/login_contr.inc.php';
            require_once __DIR__ . '/../includes/profil.inc.php';
    
            $errors = [];
    
            if(is_input_empty($old_password, $new_password)){
                $errors["empty_input"] = "Fill in all fields!";
            }
    
            $result = get_user($this->connect(), $_SESSION["user_username"]);
    
            
    
            if(!is_username_wrong($result) && is_password_wrong($old_password, $result["pwd"])){
                $errors["login_incorrect"] = "Incorrect login info!";
            }

            if($errors){
                foreach ($errors as $error) {
                    echo htmlspecialchars($error);
                }
            }else{
                update_user_password($this->connect(), $new_password);
            }

        }catch (PDOException $e) {
            die("Query failed -> ". $e->getMessage());
        }
    
    }
}

