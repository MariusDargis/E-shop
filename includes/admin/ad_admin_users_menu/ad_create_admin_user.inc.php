<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];

    try {

        require_once '../../dbh.inc.php';
        require_once 'ad_create_admin_user_model.inc.php';
        require_once 'ad_create_admin_user_contr.inc.php';

        $errors = [];

        if (fieldsUsersEmpty($username)) {
            $errors["empty_input"] = "Fill name field!";
        } else if (adUserUsed($pdo, $username)) {
            $errors["username_taken"] = "User already admin!";
        } else if (!userUsed($pdo, $username)) {
            $errors["username_not_exist"] = "User not exist!";
        }

        require_once '../../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_create_aduser"] = $errors;
            $signupData = ["item_number" => $item_number];
            $_SESSION["create_data"] = $signupData;
            
            header("Location: ../../../administrator.php");
            die();   
        }
        $resultId = getID($pdo, $username);
        createAdUser($pdo, $resultId);
        header("Location: ../../../administrator.php?create_aduser=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Create item failed: " . $e->getMessage());
    }

} else {
    header("Location: ../../../index.php");
    die();
}