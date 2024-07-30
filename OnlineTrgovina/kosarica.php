<?php
require_once 'includes/config_session.inc.php';
require_once 'Classes/Dbh.php';
require_once 'includes/login_model.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'Classes/User.php';
require_once 'Classes/Cart.php';
require_once 'Classes/Product.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/kosarica.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="indexLogiran.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Contents of you cart</h1>
        <?php

        //korisnik
        $korisnik = new User($_SESSION["user_username"]);
        $user = $korisnik->getInfo();


        //kosarica korisnika
        $cart = new Cart($user["user_id"]);
        $kosarica = $cart->getCartInfo();
        
        if($kosarica==null){
            die();
        }
        foreach ($kosarica as $item_kosare) {
            // Dohvaćanje informacija o proizvodu na temelju product_id
            $products = new Product($item_kosare["product_id"]);
            $product = $products->getProductInfo();
        
            // Izračun ukupne cijene za taj proizvod
            $itemTotal = $product['price'] * $item_kosare['quantity'];
           // $total += $itemTotal; // Zbroj ukupnog iznosa
        
            // Ispis proizvoda u tablici
            ?>
            <div class="artikl_kosarica">
                <div class="stupac_artikla_kosarica">
                    <span class="label">Proizvod:</span>
                    <span class="value"><?php echo htmlspecialchars($product['name']); ?></span>
                </div>
                <div class="stupac_artikla_kosarica">
                    <span class="label">Cijena:</span>
                    <span class="value"><?php echo number_format($product['price'], 2); ?> EUR</span>
                </div>
                <div class="stupac_artikla_kosarica">
                    <span class="label">Količina:</span>
                    <span class="value"><?php echo htmlspecialchars($item_kosare['quantity']); ?></span>
                </div>
                <div class="stupac_artikla_kosarica">
                    <span class="label">Ukupno:</span>
                    <span class="value"><?php echo number_format($itemTotal, 2); ?> EUR</span>
                </div>
                
                <div class="gumb-ukloni">
                <form action="includes/remove_from_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item_kosare['product_id']); ?>">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                    <button type="submit">Ukloni</button>
                </form>
                </div>
            </form>
            </div>
            
            <?php
        }
        ?>
        
    </main>

</body>
</html>
