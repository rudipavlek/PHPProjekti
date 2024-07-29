<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){

    $query = "SELECT username FROM users WHERE username=?;";

    $stmt = $pdo->prepare($query);

    $stmt->execute([$username]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = null;

    return $result;
}

function get_email(object $pdo, string $email){

    $query = "SELECT username FROM users WHERE email=?;";

    $stmt = $pdo->prepare($query);

    $stmt->execute([$email]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = null;

    return $result;
}

function set_user(object $pdo, string $username, string $pwd, string $email, string $first_name, string $last_name, string $address, string $city, string $postal_code, string $country, string $phone){

    $query = "INSERT INTO users (username, pwd, email, first_name, last_name, address, city, postal_code, country, phone) VALUES (?,?,?,?,?,?,?,?,?,?);";

    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->execute([$username,$hashedPwd, $email, $first_name, $last_name, $address, $city, $postal_code, $country, $phone]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = null;

    return $result;
}
