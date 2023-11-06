<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $create_user = $_POST["create_user"];
    $delete_user = 0; 
    $delete_user = $_POST["delete_user"];
    $create_item = $_POST["create_item"];
    $update_item = $_POST["update_item"];
    $delete_item = $_POST["delete_item"];
    $add_pr_user = $_POST["create_admin_user"];
    $remove_pr_user = $_POST["delete_admin_user"];
    $update_privileges = $_POST["update_privileges"];
    
   

    try {

        require_once '../../dbh.inc.php';
        require_once 'ad_update_admin_user_model.inc.php';
        require_once 'ad_update_admin_user_contr.inc.php';

        $resultId = getID($pdo, $username);
     
        UpdateAdUser($pdo, $resultId, $create_user, $delete_user, $create_item, 
        $update_item, $delete_item, $add_pr_user, 
        $remove_pr_user, $update_privileges);

        header("Location: ../../../administrator.php?update=success");

        $pdo = null;
        $stmt = null;

        die();  

    } catch (PDOException $e){
        die("Update failed: " . $e->getMessage());
    }

} else {
    header("Location: ../../../index.php");;
    die();
}