<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {

        require_once '../../dbh.inc.php';
        require_once 'ad_create_user_model.inc.php';
        require_once 'ad_create_user_contr.inc.php';

        $errors = [];

        if (fieldsUsersEmpty($username, $pwd)) {
            $errors["empty_input"] = "Fill name and password fields!";
        } else if (userUsed($pdo, $username)) {
            $errors["username_taken"] = "User already used!";
        }

        require_once '../../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_create_user"] = $errors;
            $signupData = ["item_number" => $item_number];
            $_SESSION["create_data"] = $signupData;
            
            header("Location: ../../../administrator.php");
            die();   
        }

        createUser($pdo, $username, $pwd);
        header("Location: ../../../administrator.php?create_user=success");

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