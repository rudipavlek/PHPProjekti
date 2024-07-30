<link rel="stylesheet" href="css/main.css">


<?php


require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
    if(!isset($_SESSION["user_id"])){?>
    <div>
    <h3>Signup</h3>

    <form action= "includes/signup.inc.php" method = "post">
        <input type= "text" name = "username" placeholder= "Username">
        <input type= "password" name = "pwd" placeholder= "Password">
        <input type= "text" name = "email" placeholder= "Email">
        <input type= "text" name = "first_name" placeholder= "First Name">
        <input type= "text" name = "last_name" placeholder= "Last Name">
        <input type= "text" name = "address" placeholder= "Adress">
        <input type= "text" name = "city" placeholder= "City">
        <input type= "text" name = "postal_code" placeholder= "Postal Code">
        <input type= "text" name = "country" placeholder= "Country">
        <input type= "text" name = "phone" placeholder= "Phone">
        <button>Signup</button>
    </form>
    </div>


    <div class ="home_screen">
    <form action= "indexLogin.php" method = "post">
        <button>Back</button>
    </form>
    </div>

    <?php
        check_signup_errors();
    ?>
    <?php
    }
    ?>
