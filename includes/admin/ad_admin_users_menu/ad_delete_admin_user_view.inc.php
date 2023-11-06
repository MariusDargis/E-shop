<?php

declare(strict_types=1);

function checkDeleteAdUser() 
{
    if (isset($_SESSION['errors_delete_aduser'])) {
        $errors = $_SESSION['errors_delete_aduser'];

        echo "<br>";
        
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_delete_aduser']);
    
    } else if (isset($_GET["delete_aduser"]) && $_GET["delete_aduser"] === "success") {
        echo '<br>';
        echo '<p>Admin User deleted!</p>';
    }
}


