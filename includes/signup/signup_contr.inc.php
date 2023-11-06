<?php

declare(strict_types=1);

function isInputEmpty (string $username, string $pwd) 
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameTaken(object $pdo, string $username) 
{
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function createUser(object $pdo, string $username, string $pwd) 
{
    setUser($pdo, $username, $pwd);
}