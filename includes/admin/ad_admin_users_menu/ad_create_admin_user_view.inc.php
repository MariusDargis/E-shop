<?php

declare(strict_types=1);

function checkCreateAdUserErrors() 
{
    if (isset($_SESSION['errors_create_aduser'])) {
        $errors = $_SESSION['errors_create_aduser'];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_create_aduser']);
    
    } else if (isset($_GET["create_aduser"]) && $_GET["create_aduser"] === "success") {
        echo '<br>';
        echo '<p>User created!</p>';
    }
}

