<?php

declare(strict_types=1);

function deleteAdUserEmpty(string $username) 
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


function deleteAdUser(object $pdo, string $username) 
{
    setUsername($pdo, $username);
}
 