<?php

require_once 'all_items_model.inc.php';

function showItems($results) {
    foreach ($results as $row) {
        echo "<div class='results_box'>";
        echo "<div class='results_box_1'>" . 
        htmlspecialchars($row["item_number"]) . "</div>";
        echo "<div class='results_box_mid'>";
         echo "<div class='results_box_2'>" . 
        htmlspecialchars($row["item_name"]) . "</div>";
        echo "<div class='results_box_3'>" . 
        htmlspecialchars($row["item_info"]) . "</div>";
        echo "</div>";
        echo "<div class='results_box_4'>" . 
        htmlspecialchars($row["quantity"]) . "pc" .  "</div>";
        echo "</div>";
    }
}