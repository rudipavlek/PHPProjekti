<?php
require_once 'includes/config_session.inc.php';
require_once 'Classes/Dbh.php';
require_once 'Classes/Product.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proizvodi</title>
    <link rel="stylesheet" href="css/proizvodi.css">
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
        <h1>Products</h1>
        <?php

        //ispis svih proizvoda
        
        $product = new Product();
        $proizvodi = $product->get_all_products();
        
        if($proizvodi==null){
            die();
        }
        foreach ($proizvodi as $item_proizvod) {
            ?>
            <div class="artikl_proizvod">
                <div class="stupac_artikl_proizvod">
                    <span class="label">Proizvod:</span>
                    <span class="value"><?php echo htmlspecialchars($item_proizvod['name']); ?></span>
                </div>
                <div class="stupac_artikl_proizvod">
                    <span class="label">Cijena:</span>
                    <span class="value"><?php echo number_format($item_proizvod['price'], 2); ?> EUR</span>
                </div>
                <div class="stupac_artikl_proizvod">
                    <span class="label">Opis:</span>
                    <span class="value"><?php echo htmlspecialchars($item_proizvod['description']); ?></span>
                </div>
                <div class="stupac_artikl_proizvod">
                    <span class="label">Zaliha:</span>
                    <span class="value"><?php echo htmlspecialchars($item_proizvod['stock']); ?></span>
                </div>

                <div class="gumb-dodaj">
                <form action="includes/add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item_proizvod['product_id']); ?>">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION["user_id"]); ?>">
                    <button type="submit">Add to cart</button>
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
