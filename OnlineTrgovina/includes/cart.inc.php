<?php

require_once 'config_session.inc.php';
function get_info_cart(object $pdo, int $user_id){

$query = "SELECT * FROM cart WHERE user_id=?;";

$stmt = $pdo->prepare($query);

$stmt->execute([$user_id]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = null;

return $result;
}

function remove_from_cart(object $pdo, int $user_id, $product_id){

    $query = "DELETE FROM cart WHERE user_id=? && product_id=?;";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute([$user_id, $product_id]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = null;
    
    return $result;
}

function add_to_cart(object $pdo, int $user_id, $product_id){

    $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?,?,?);";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute([$user_id, $product_id, 1]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = null;
    
    return $result;
}

function add_to_cart_quantity(object $pdo, int $user_id, $product_id){

    $query = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = ?;";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute([$product_id]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = null;
    
    return $result;
}