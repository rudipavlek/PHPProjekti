<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){


    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $favouritepet = htmlspecialchars($_POST["favouritepet"]);


    if(empty($firstname) || empty($firstname) || empty($favouritepet)){
        header("Location: ../index.php");
        exit();
    }

    echo "Ovo su podaci koje je korisnik unio";

    echo "<br>";
    echo $firstname;

    echo "<br>";
    echo $lastname;

    echo "<br>";
    echo $favouritepet;

    header("Location: ../index.php");

}

else{
   header("Location: ../index.php");
}