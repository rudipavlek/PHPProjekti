<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];


    try {
        require_once "dbh.inc.php";

        $query = "DELETE FROM users WHERE username = ? AND pwd = ?;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $pwd]);

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