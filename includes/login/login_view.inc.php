<?php

declare(strict_types=1);

function outputUsername() 
{
    if (isset($_SESSION["user_id"])) {
        echo "You are logged in as " . $_SESSION["user_username"];
    } else {
        echo "You are not logged in";
    }
}

function checkLoginErrors() 
{
    if(isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION["errors_login"]);

    } else if (isset($GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<p>Login success!</p>'; 
    }
}
