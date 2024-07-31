<?php
require_once 'includes/config_session.inc.php';
require_once 'Classes/Dbh.php';
require_once 'includes/login_model.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'Classes/User.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-left">
                <h1>Online Store</h1>
            </div>
            <div class="header-right">
                <div class="username">
                    <h3><?php echo htmlspecialchars(output_username()); ?></h3>
                </div>
                <div class="logout">
                    <form action="indexLogiran.php" method="post">
                        <button>Back</button>
                    </form>
                </div>
            </div>
        </div>
    </header>


    <main>
        <h2>My Profile</h2>
        <?php
        $korisnik = new User(output_username());
        $user = $korisnik->getInfo();
        ?>
        <form action="includes/updateProfileInformation.php" method="post">
            <fieldset>
                <legend>Update Profile</legend>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                <br>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                <br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                <br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                <br>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>">
                <br>

                <label for="postal_code">Postal Code:</label>
                <input type="text" id="postal_code" name="postal_code" value="<?php echo htmlspecialchars($user['postal_code']); ?>">
                <br>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>">
                <br>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                <br>

                <button type="submit" name="update_profile">Update Profile</button>
            </fieldset>
        </form>

        <form action="includes/updatePassword.php" method="post">
            <fieldset>
                <legend>Change Password</legend>
                <label for="old_password">Old Password:</label>
                <input type="password" id="old_password" name="old_password" required>
                <br>

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
                <br>

                <button type="submit" name="change_password">Change Password</button>
            </fieldset>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Online Store. All rights reserved.</p>
    </footer>
</body>
</html>
