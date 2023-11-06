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


function deleteItem(object $pdo, int $item_number) 
{
    setItem($pdo, $item_number);
}
 