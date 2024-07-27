<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];


    require_once "../Classes/Dbh.php";
    require_once "../Classes/Login.php";

    $login = new Login($username, $pwd);
    $login->loginUser();
}else{
    header("Location: ../index.php");
    die();
}