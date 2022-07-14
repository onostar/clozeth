<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['request'])){

        $user_id = $_GET['request'];
        $update_payment = $connectdb->prepare("DELETE FROM request_hotel WHERE request_id = :request_id");

        $update_payment->bindvalue("request_id", $user_id);
        $update_payment->execute();

        if($update_payment){
            $_SESSION['success'] = "Accomodation request Declined!";
            header("Location: ../views/admin.php");
        }else{
            $_SESSION['error'] = "Failed to confirm payment!";
            header("Location: ../views/admin.php");
        }
        
        
    }
?>