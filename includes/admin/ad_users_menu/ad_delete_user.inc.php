<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
  
    try {

        require_once '../../dbh.inc.php';
        require_once 'ad_delete_user_model.inc.php';
        require_once 'ad_delete_user_contr.inc.php';

        $errors = [];

        if (deleteUserEmpty($username)){
            $errors["empty_input"] = "Fill username!";
        } else if ($username == "admin") {
            $errors["admin"] = "admin neistrinamas!!!!";
        }
        else if (!userUsed($pdo, $username)){
            $errors["user_taken"] = "User not exist!!!!";
        } 

        require_once '../../config_session.inc.php';

        if ($errors) { 
            $_SESSION["errors_delete_user"] = $errors;
            $signupData = ["item_number" => $item_number];
            $_SESSION["delete_data"] = $signupData;

            header("Location: ../../../administrator.php"); 
            die();
        }
     
        deleteUser($pdo, $username);

        header("Location: ../../../administrator.php?delete_user=success");

        $pdo = null;
        $stmt = null;

        die();  

    } catch (PDOException $e){
        die("Delete failed: " . $e->getMessage());
    }

} else {
    header("Location: ../../../index.php");
    die();
}