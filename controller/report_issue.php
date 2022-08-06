<?php
    session_start();
    require "server.php";

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    // $_SESSION['error'] = "";
    // $_SESSION['success'] = "";
    if(isset($_POST['send_report'])){
        
        $full_name = ucwords(validate('full_name'));
        $email = strtolower(validate('email_address'));
        $phone_number = validate('phone_number');
        $reason = validate('reason');
        $company = validate('company');
        $item = validate('item_name');
        $description = validate('description');
       
        
        if(strlen($phone_number) != 11){
            $_SESSION['phoneError'] = "Phone Number must be 11 digits";
            header("Location: ../view/report_product.php");
        }else{
            $statement = $connectdb->prepare("INSERT INTO reports (full_name, phone_number, email_address, reason, company, item_name, description) VALUES (:full_name, :phone_number, :email_address, :reason, :company, :item_name, :description)");

            $statement->bindvalue('full_name', $full_name);
            $statement->bindvalue('email_address', $email);
            $statement->bindvalue('phone_number', $phone_number);
            $statement->bindvalue('reason', $reason);
            $statement->bindvalue('company', $company);
            $statement->bindvalue('item_name', $item);
            $statement->bindvalue('description', $description);
            $statement->execute();

            $_SESSION['reported'] = "";
            header("Location: ../view/report_product.php");
        }
    }

