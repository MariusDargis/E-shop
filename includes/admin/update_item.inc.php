<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $item_number = $_POST["item_number"];
    $item_name = $_POST["item_name"];
    $item_info = $_POST["item_info"];
    $quantity = $_POST["quantity"];

    try {

        require_once '../dbh.inc.php';
        require_once 'update_item_model.inc.php';
        require_once 'update_item_contr.inc.php';

        $errors = [];

        if (itemNumberEmpty($item_number)){
            $errors["empty_input"] = "Fill item number!";
        } else if (!itemNumberUsed($pdo, $item_number)){
            $errors["item_number_taken"] = "Item number not exist!";
        }

        require_once '../config_session.inc.php';

        if ($errors) { 
            $_SESSION["errors_update"] = $errors;
            $signupData = ["item_number" => $item_number];
            $_SESSION["update_data"] = $signupData;

            header("Location: ../../administrator.php"); 
            die();
        }
     
        updateItem($pdo, $item_number, $item_name, $item_info, $quantity);

        header("Location: ../../administrator.php?update=success");

        $pdo = null;
        $stmt = null;

        die();  

    } catch (PDOException $e){
        die("Update failed: " . $e->getMessage());
    }

} else {
    header("Location: admin.php");
    die();
}