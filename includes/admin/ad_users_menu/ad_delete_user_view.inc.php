<?php

declare(strict_types=1);

function checkDeleteUser() 
{
    if (isset($_SESSION['errors_delete_user'])) {
        $errors = $_SESSION['errors_delete_user'];

        echo "<br>";
        
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_delete_user']);
    
    } else if (isset($_GET["delete_user"]) && $_GET["delete_user"] === "success") {
        echo '<br>';
        echo '<p>User deleted!</p>';
    }
}


