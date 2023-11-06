<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        $errors = [];

        if (isInputEmpty($username, $pwd)) {
            $errors["empty_input"] = "Fill all fields!";
        }

        $result = getUser($pdo, $username, $pwd);

        if (isUsernamePwdWrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] =$result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["last_regeneration"] = time();

        if ($username == "admin") {
            header("Location: ../../administrator.php");
            $pdo = null;
            $statement = null;
            die();
        } else {
            header("Location: ../../users.php");
            $pdo = null;
            $statement = null;
            die();
        }

    } catch(PDOException $e) {
        die("Login error" . $e->getMessage());
    }
    
} else {
    header("Location: ../index.php");
    die();
}