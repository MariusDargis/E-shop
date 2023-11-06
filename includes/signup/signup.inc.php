<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once '../dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        $errors = [];
        
        if (isInputEmpty($username, $pwd)) {
            $errors["empty_input"] = "Fill all fields!";
        }

        if (isUsernameTaken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";
        }

        require_once '../config_session.inc.php';
        
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $signupData = ["username" => $username,];
            $SESSION["signup_data"] = $signupData;
               
            header("Location: ../../index.php"); 
            die();
        }

        createUser($pdo, $username, $pwd);
        header("Location: ../../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die(); 

    } catch(PDOException $e) {
        die("Signup failed: " . $e->getMessage());
    }
    
} else {
    header("Location: ../../index.php");
    die();
}