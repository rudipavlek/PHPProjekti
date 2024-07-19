<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];


    try {
        require_once "dbh.inc.php";

        $query = "UPDATE users SET username = ?, pwd = ?, email = ? WHERE id = 2;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $pwd, $email]);

        $pdo = null;
        $stmt = null;


        header("Location: ../index.php");

        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else{
    header("Location: ../index.php");
}