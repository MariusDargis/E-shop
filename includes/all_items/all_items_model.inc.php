<?php

try {
  require_once "dbh.inc.php";

  $query = "SELECT * FROM items WHERE 1;";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $pdo = null;

} catch (PDOException $e) {
  die("Query failed" . $e->getMessage());
}