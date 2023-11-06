<?php

declare(strict_types=1);

function checkCreateUserErrors() 
{
    if (isset($_SESSION['errors_create_user'])) {
        $errors = $_SESSION['errors_create_user'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_create_user']);
    
    } else if (isset($_GET["create_user"]) && $_GET["create_user"] === "success") {
        echo '<br>';
        echo '<p>User created!</p>';
    }
}

