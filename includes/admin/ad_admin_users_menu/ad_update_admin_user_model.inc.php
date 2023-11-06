<?php

declare(strict_types=1);

require_once "dbh.inc.php";


    $query = "SELECT username as username
    FROM users
    INNER JOIN users_privileges ON users_privileges.user_id=users.id;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $allAdUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $allAdUsers;

    function getID(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $resultI = $stmt->fetch(PDO::FETCH_COLUMN);    
    return $resultI;
}
 
function setUpdateAdUser(object $pdo, int $resultId, bool $create_user, bool $delete_user, 
bool $create_item, bool $update_item, bool $delete_item, bool $add_pr_user, 
bool $remove_pr_user , bool $update_privileges)
{
    $query = "UPDATE users_privileges
    SET create_user = :create_user, delete_user = :delete_user, 
    create_item = :create_item, update_item = :update_item, delete_item = :delete_item,
    add_pr_user = :add_pr_user, remove_pr_user = :remove_pr_user, update_privileges = :update_privileges
    WHERE user_id = :resultId;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":resultId", $resultId);
    $stmt->bindParam(":create_user", $create_user);
    $stmt->bindParam(":delete_user", $delete_user);
    $stmt->bindParam(":create_item", $create_item);
    $stmt->bindParam(":update_item", $update_item);
    $stmt->bindParam(":delete_item", $delete_item);
    $stmt->bindParam(":add_pr_user", $add_pr_user);
    $stmt->bindParam(":remove_pr_user", $remove_pr_user);
    $stmt->bindParam(":update_privileges", $update_privileges);
    $stmt->execute();
}