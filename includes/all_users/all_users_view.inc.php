<?php

require_once 'all_users_model.inc.php';

function showAllUsers($usersResults) 
{
    foreach ($usersResults as $row) {
        echo "<div class='all_users'>" . 
        htmlspecialchars($row["username"]) . "</div>";
    } 
}
