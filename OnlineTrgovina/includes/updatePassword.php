<?php

require_once 'config_session.inc.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];

    
    require_once __DIR__ . "/../Classes/Dbh.php";
    require_once __DIR__ . "/../Classes/User.php";

    $user = new User($_SESSION["user_username"]);
    $user->updatePassword($old_password, $new_password);
    header("Location: ../profilKorisnik.php");

}else{
    header("Location: ../profilKorisnik.php");
    die();
}
