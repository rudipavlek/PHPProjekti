<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
    <div>
    <h3>Signup</h3>

    <form action= "includes/usercreate.inc.php" method = "post">
        <input type= "text" name = "username" placeholder= "Username">
        <input type= "password" name = "pwd" placeholder= "Password">
        <input type= "text" name = "email" placeholder= "Email">
        <button>Signup</button>
    </form>
    </div>

    <div>
    <h3>Change accout</h3>

    <form action = "includes/userupdate.inc.php" method = "post">
        <input type= "text" name= "username" placeholder = "Username">
        <input type= "password" name= "pwd" placeholder = "Password">
        <input type= "text" name= "email" placeholder = "Email">
        <button>Update</button>
    </form>
    </div>

    <div>
    <h3>Delete accout</h3>

    <form action = "includes/userdelete.inc.php" method = "post">
        <input type= "text" name= "username" placeholder = "Username">
        <input type= "password" name= "pwd" placeholder = "Password">
        <button>Delete</button>
    </form>
    </div>


    <div>
    <h3>Search</h3>

    <form class = "searchform" action= "search.php" method = "post">
        <label for= "search">Search for user:</label>
        <input id= "search" type= "text" name= "usersearch" placeholder= "Search...">
        <button>Search</button>
    </form>
    </div>

</body>
</html>