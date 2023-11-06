<?php

declare(strict_types=1);

function getItemNumber(object $pdo, int|string $item_number) 
{
    $query = "SELECT item_number FROM items WHERE item_number = :item_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":item_number", $item_number);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
} 
 
function setItem(object $pdo, int|string $item_number, string $item_name, 
string $item_info, int|string $quantity) 
{
    $query = "UPDATE items SET  item_number = :item_number, 
    item_name= :item_name, item_info = :item_info, quantity = :quantity
    WHERE item_number = :item_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":item_number", $item_number);
    $stmt->bindParam(":item_name", $item_name);
    $stmt->bindParam(":item_info", $item_info);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->execute();
}