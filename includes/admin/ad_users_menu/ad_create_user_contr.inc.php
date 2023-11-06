<?php

declare(strict_types=1);

function fieldsUsersEmpty(string $username, string $pwd) 
{
    if (empty($username) || empty($pwd)) {
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


function createUser(object $pdo, string $username, string $pwd) 
{
    setUser ($pdo, $username, $pwd);
}
 