<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $item_number = $_POST["item_number"];
    $item_name = $_POST["item_name"];
    $item_info = $_POST["item_info"];
    $quantity = $_POST["quantity"];

    try {

        require_once '../dbh.inc.php';
        require_once '../admin/create_item_model.inc.php';
        require_once '../admin/create_item_contr.inc.php';

        $errors = [];

        if (fieldsEmpty($item_number, $item_name)) {
            $errors["empty_input"] = "Fill item number and name fields!";
        } else if (itemNumberUsed($pdo, $item_number)) {
            $errors["item_number_taken"] = "Item number already used!";
        }

        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_create"] = $errors;
            $signupData = ["item_number" => $item_number];
            $_SESSION["create_data"] = $signupData;
            
            header("Location: ../../users.php");
            die();
        }
    
        createItem($pdo, $item_number, $item_name, $item_info, $quantity);
        header("Location: ../../users.php?create=success");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Create item failed: " . $e->getMessage());
    }
    
} else {
    header("Location: ../../index.php");
    die();
}