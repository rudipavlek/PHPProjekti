<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/login_view.inc.php';
    require_once 'includes/redirect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineTrgovina</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-left">
                <h1>Welcome</h1>
            </div>
            <div class="header-right">
                <div class="username">
                    <h3><?php echo output_username(); ?></h3>
                </div>
                <div class="logout">
                    <form action="includes/logout.inc.php" method="post">
                        <button>Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="indexLogiran.php">Home</a></li>


            <li>
            <form action= "proizvodi.php" method = "post">
                <button>Products</button>
            </form>
            </li>

            <li>
            <form action= "kosarica.php" method = "post">
                <button>Cart</button>
            </form>
            </li>

            <li>
            <form action= "profilKorisnik.php" method = "post">
                <button>Profile</button>
            </form>
            </li>
        </ul>
    </nav>

    <main>

        <div class="featured-products">
            <h2>Discounted items</h2>
            <div class="product-list">
                <div class="product-item">
                    <img src="images/nikePopust.png" alt="Product 1">
                    <h3>Product 1</h3>
                    <p>$102.00</p>
                    <button>Add to Cart</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Online Store. All rights reserved.</p>
    </footer>
</body>
</html>