<?php

try {

    require_once 'privileges_model.inc.php';

    function privilegeCreateItem($result) 
    {
        foreach ($result as $row) {
            if ($row["create_item"] === 1){
                echo "<form action='includes/users/us_create_item.inc.php' method='post'>";
                echo "<h2>CREATE ITEM</h2>";
                echo "<input type='number' name='item_number' 
                placeholder='Item number'>";
                echo "<input type='text' name='item_name' 
                placeholder='Name'>";
                echo "<input type='text' name='item_info' 
                placeholder='Info'>";
                echo "<input type='number' name='quantity' 
                placeholder='Item quantity'>";
                echo "<button type='submit'>CREATE</button>";
                echo checkCreateItemErrors();
                echo "</form>";
            }   
        }
    }

    function privilegeUpdateItem($result) 
    {
        foreach ($result as $row) {
            if ($row["update_item"] === 1){
                echo "<form action='includes/users/us_update_item.inc.php' method='post'>";
                echo "<h2>UPDATE ITEM</h2>";
                echo "<p>(Item number cannot be changed)</p>";
                echo "<input type='number' name='item_number' 
                placeholder='Item number'>";
                echo "<input type='text' name='item_name' 
                placeholder='Name'>";
                echo "<input type='text' name='item_info' 
                placeholder='Info'>";
                echo "<input type='number' name='quantity' 
                placeholder='Item quantity'>";
                echo "<button type='submit'>UPDATE</button>";
                echo checkUpdateItemErrors();
                echo "</form>";
            }
        }
    }

    function privilegeDeleteItem($result) 
    {
        foreach ($result as $row) {
            if ($row["delete_item"] === 1){
                echo "<form action='includes/users/us_delete_item.inc.php' method='post'>";
                echo "<h2>DELETE ITEM</h2>";
                echo "<input type='number' name='item_number' 
                placeholder='Item number'>";
                echo "<button type='submit'>DELETE</button>";
                echo checkDeleteItemErrors();
                echo "</form>";
            }
        } 
    }

} catch(PDOException $e) {
    die("Login error" . $e->getMessage());
} 

