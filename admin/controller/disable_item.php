<?php
    include "connections.php";
    session_start();


    if(isset($_GET['item'])){
        $item = $_GET['item'];
        $update_status = $connectdb->prepare("UPDATE menu SET item_status = 1 WHERE item_id = :item_id");
        $update_status->bindvalue("item_id", $item);
        $update_status->execute();

        if($update_status){
            $_SESSION['success'] = "Item Disabled";
            header("Location: ../views/exhibitors.php");
        }else{
            $_SESSION['error'] = "Unable disable item";
            header("Location: ../views/exhibitors.php");

        }
    }
?>