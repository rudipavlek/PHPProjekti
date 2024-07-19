<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userSearch = $_POST["usersearch"];


    try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT * FROM comments WHERE username = ?";

        $stmt = $pdo->prepare($query);


        $stmt->execute([$userSearch]);


        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else{
    header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    

    <h3>Search results</h3>

    <?php

    if(empty($results)){
        echo "<div>";
        echo "<p>There were no results!</p>";
        echo "</div>";
    }else{
        foreach ($results as $row) {
            echo htmlspecialchars($row["username"]);
            echo htmlspecialchars($row["comment_text"]);
            echo htmlspecialchars($row["created_at"]);
        }
    }

    ?>

</body>
</html>