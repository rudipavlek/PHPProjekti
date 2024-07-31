<?php

require_once 'config_session.inc.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];

    
    require_once __DIR__ . "/../Classes/Dbh.php";
    require_once __DIR__ . "/../Classes/User.php";
    require_once __DIR__ . '/../includes/cart.inc.php';

    $user = new User($_SESSION["user_username"]);
    $user->updateProfile($first_name, $last_name, $email, $address, $city, $postal_code, $country, $phone);
    header("Location: ../profilKorisnik.php");

}else{
    header("Location: ../profilKorisnik.php");
    die();
}
