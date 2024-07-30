<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $product_id = $_POST["product_id"];
    $user_id = $_POST["user_id"];

    
    require_once __DIR__ . "/../Classes/Dbh.php";
    require_once __DIR__ . "/../Classes/Cart.php";
    require_once __DIR__ . '/../includes/cart.inc.php';

    $cart = new Cart($user_id);
    $cart->add_item($product_id);
    header("Location: ../proizvodi.php");

}else{
    header("Location: ../indexLogiran.php");
    die();
}