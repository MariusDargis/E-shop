<?php
 
declare(strict_types=1);

function getUser(object $pdo, string $username) 
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
 
function setUsername(object $pdo, string $username) 
{
    $query = "DELETE users_privileges FROM users_privileges 
    INNER JOIN users ON users_privileges.user_id=users.id 
    WHERE users.username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
}  