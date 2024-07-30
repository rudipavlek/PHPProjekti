<?php
require_once 'includes/config_session.inc.php';
function get_info_product(object $pdo, int $product_id){

$query = "SELECT * FROM products WHERE product_id=?;";

$stmt = $pdo->prepare($query);

$stmt->execute([$product_id]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

return $result;
}

function get_all_products(object $pdo){

    $query = "SELECT * FROM products;";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = null;
    
    return $result;
    }