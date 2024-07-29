<?php

function get_info_user(object $pdo, string $username){

$query = "SELECT * FROM users  WHERE username=?;";

$stmt = $pdo->prepare($query);

$stmt->execute([$username]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

return $result;
}