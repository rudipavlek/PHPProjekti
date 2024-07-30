<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<script>
function redirectToSignup() {
    window.location.href = "indexSignup.php";
}
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    

    <h3 class = "output_username">
        <?php
        echo output_username();
        ?>
    </h3>

    <?php
    if(!isset($_SESSION["user_id"])){?>
        <div>
            <h3>Login</h3>

            <form action= "includes/login.inc.php" method = "post">
                <input type= "text" name = "username" placeholder= "Username">
                <input type= "password" name = "pwd" placeholder= "Password">
                <button>Login</button>
            </form>

        <?php
        check_login_errors();
        ?>
    
        </div>
    <?php
    }
    ?>
    
    <div id="signupButtonContainer">
        <button id="signupButton" onclick="redirectToSignup()">Signup</button>
    </div>

</body>
</html>