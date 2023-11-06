<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $item_number = $_POST["item_number"];
  
    try {

        require_once '../dbh.inc.php';
        require_once 'delete_item_model.inc.php';
        require_once 'delete_item_contr.inc.php';

        $errors = [];

        if (itemNumberEmpty($item_number)){
            $errors["empty_input"] = "Fill item number!";
        } else if (!itemNumberUsed($pdo, $item_number)){
            $errors["item_number_taken"] = "Item number not exist!!!!";
        } 

        require_once '../config_session.inc.php';

        if ($errors) { 
            $_SESSION["errors_delete"] = $errors;
            $signupData = ["item_number" => $item_number];
            $_SESSION["delete_data"] = $signupData;

            header("Location: ../../administrator.php"); 
            die();
        }
     
        deleteItem($pdo, $item_number);

        header("Location: ../../administrator.php?delete=success");

        $pdo = null;
        $stmt = null;

        die();  

    } catch (PDOException $e){
        die("Delete failed: " . $e->getMessage());
    }

} else {
    header("Location: admin.php");
    die();
}