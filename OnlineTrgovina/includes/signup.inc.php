
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];


    require_once "../Classes/Dbh.php";
    require_once "../Classes/Signup.php";

    $signup = new Signup($username, $pwd, $email, $first_name, $last_name, $address, $city, $postal_code, $country, $phone);
    $signup->signupUser();
}
else{
    header("Location: ../index.php");
    die();
}