<?php

declare(strict_types=1);

function fieldsUsersEmpty(string $username) 
{
    if (empty($username)) {
        return true;
    } else {
        return false;
    }
}

function adUserUsed(object $pdo, string $username) 
{
    if (getAdUser($pdo, $username)) {
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




function createAdUser(object $pdo, int $resultId) 
{
    setAdUser ($pdo, $resultId);
}
 