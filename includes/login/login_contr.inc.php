<?php

declare(strict_types=1);

function isInputEmpty(string $username, string $pwd) 
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function isUsernamePwdWrong(bool|array $result) 
{
    if(!$result) {
        return true;
    } else {
        return false;
    }
}