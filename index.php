<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup/signup_view.inc.php';
    require_once 'includes/login/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/main.css">
</head>

<body>

    <h1>E-SHOP</h1>

    <div class="form-box">
        <h2>LOGIN</h2>

        <form class="form-login" action="includes/login/login.inc.php" 
        method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <button type="submit">Login</button>
            <?php
            checkLoginErrors();
            ?>
        </form>

        <h2>SIGNUP</h2>

        <form class="form-signup" action="includes/signup/signup.inc.php" 
        method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <button type="submit">Signup</button>
            <?php
                checkSignupErrors();
            ?>
        </form>

        <form class="form-signup" action="includes/logout.inc.php" 
        method="post">
            <button type="submit">LOGOUT</button>
        </form>
    </div>

    <?php
    outputUsername();
    ?>
    
</body>

</html>