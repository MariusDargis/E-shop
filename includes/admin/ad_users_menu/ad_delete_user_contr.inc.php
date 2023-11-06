<?php

declare(strict_types=1);

function deleteUserEmpty(string $username) 
{
    if (empty($username)) {
        return true;
    } else {
        return false;
    }
}

function userUsed(object $pdo, string $username) 
{
    if (getUser($pdo, $username)) {
        return true;
    } else {
        return false;
    }
} 


function deleteUser(object $pdo, string $username) 
{
    setUsername($pdo, $username);
}
 