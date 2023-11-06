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
 
function setItem(object $pdo, int|string $item_number) 
{
    $query = "DELETE FROM items WHERE item_number = :item_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":item_number", $item_number);
    $stmt->execute();
}