<?php

declare(strict_types=1);

require_once 'ad_update_admin_user_model.inc.php';

function showOptionAdUsers($allAdUsers) 
{
    foreach ($allAdUsers as $row) {
        echo "<option value='" . htmlspecialchars($row['username']) . "'>" 
        . htmlspecialchars($row["username"]) . "</option>";
    }
}


