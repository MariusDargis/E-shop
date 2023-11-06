<?php

declare(strict_types=1);

function itemNumberEmpty(int|string $item_number) 
{
    if (empty($item_number)) {
        return true;
    } else {
        return false;
    }
}

function itemNumberUsed(object $pdo, int|string $item_number) 
{
    if (getItemNumber($pdo, $item_number)) {
        return true;
    } else {
        return false;
    }
}


function updateItem(object $pdo, int|string $item_number, string $item_name, 
string $item_info, int|string $quantity) 
{
    setItem($pdo, $item_number, $item_name, $item_info, $quantity);
}
 