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
}

