<?php

require_once 'config_session.inc.php';

function get_info_user(object $pdo, string $username){

$query = "SELECT * FROM users  WHERE username=?;";

$stmt = $pdo->prepare($query);

$stmt->execute([$username]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

return $result;
}

function update_user_profile(object $pdo, string $first_name, string $last_name, string $email, string $address, string $city, string $postal_code, string $country, string $phone){

    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, address = ?, city = ?, postal_code = ?, country = ?, phone = ?  WHERE user_id=?;";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute([$first_name, $last_name, $email, $address, $city, $postal_code, $country, $phone, $_SESSION["user_id"]]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = null;
    
    return $result;
}

function update_user_password(object $pdo, string $new_password){
 
    $query = "UPDATE users SET pwd = ? WHERE user_id=?;";
    
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($new_password, PASSWORD_BCRYPT, $options);
    
    $stmt->execute([$hashedPwd, $_SESSION["user_id"]]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = null;
    
    return $result;
}

