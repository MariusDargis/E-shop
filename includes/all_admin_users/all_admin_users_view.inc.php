<?php

require_once 'all_admin_users_model.inc.php';

function showAllAdUsers($adUsersResults) 
{
    foreach ($adUsersResults as $row) {
        echo "<div class='all_ad_us_box'>";
        echo "<div class='all_ad_us_name'>" . htmlspecialchars($row["aduser"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Create user: </p>" . htmlspecialchars($row["crUser"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Delete user: </p>" . htmlspecialchars($row["deUser"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Create item: </p>" . htmlspecialchars($row["crItem"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Update item: </p>" . htmlspecialchars($row["upItem"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Delete item: </p>" . htmlspecialchars($row["deItem"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Create admin user: </p>" . htmlspecialchars($row["addPrUser"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Delete admin user: </p>" . htmlspecialchars($row["dePrUser"]) . "</div>";
        echo "<div class='all_ad_us'>" . "<p>Update privileges: </p>" . htmlspecialchars($row["upPr"]) . "</div>";
        echo "</div>";
    }
}