<?php

try {
  require_once(realpath(dirname(__FILE__) . '../../dbh.inc.php'));

  $query = "SELECT * FROM users WHERE 1;";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $usersResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $pdo = null;

} catch (PDOException $e) {
  die("Query failed" . $e->getMessage());
}