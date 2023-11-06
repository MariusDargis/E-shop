<?php

try {
  require_once "dbh.inc.php";

  $query = "SELECT users.username as aduser,
  users_privileges.create_user as crUser,
  users_privileges.delete_user as deUser,
  users_privileges.create_item as crItem,
  users_privileges.update_item as upItem,
  users_privileges.delete_item as deItem,
  users_privileges.add_pr_user as addPrUser,
  users_privileges.remove_pr_user as dePrUser,
  users_privileges.update_privileges as upPr 
  FROM users_privileges
  INNER JOIN users ON users_privileges.user_id=users.id;";

  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $adUsersResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $pdo = null;

} catch (PDOException $e) {
  die("Query failed" . $e->getMessage());
}