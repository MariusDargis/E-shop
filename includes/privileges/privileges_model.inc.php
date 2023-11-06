<?php

require_once 'dbh.inc.php';


    $username = $_SESSION["user_username"];

    $query = "SELECT *
              FROM users_privileges
              INNER JOIN users ON users_privileges.user_id=users.id
              WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    $stmt = null;