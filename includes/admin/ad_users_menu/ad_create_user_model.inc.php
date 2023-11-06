<?php

declare(strict_types=1);

function getUser(object $pdo, string $username) 
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
} 
 

function setUser(object $pdo, string $username, string $pwd) 
{
    $query = "INSERT INTO users (username, pwd) 
    VALUES(:username, :pwd);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->execute();
}