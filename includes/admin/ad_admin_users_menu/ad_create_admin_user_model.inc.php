<?php

declare(strict_types=1);

function getAdUser(object $pdo, string $username) 
{
    $query = "SELECT users.username as username
    FROM users_privileges
    INNER JOIN users ON users_privileges.user_id=users.id
    WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function getUser(object $pdo, string $username) 
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function getID(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $resultI = $stmt->fetch(PDO::FETCH_COLUMN);    
    return $resultI;
}

function setAdUser(object $pdo, int $resultId) 
{
    $query = "INSERT INTO users_privileges (user_id) 
    VALUES(:user_id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $resultId);
    $stmt->execute();
}