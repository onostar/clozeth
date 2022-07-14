<?php
    include "connections.php";
    session_start();

   

    if(isset($_POST['change_prize'])){
        $new_prize = htmlspecialchars(stripslashes($_POST['item_prize']));
        $old_prize = htmlspecialchars(stripslashes($_POST['old_prize']));
        $item_id = $_POST['item_id'];
        
        $update_price = $connectdb->prepare("UPDATE menu SET previous_price = :previous_price,  item_prize = :item_prize WHERE item_id = :item_id");
        $update_price->bindvalue('previous_price', $old_prize);
        $update_price->bindvalue('item_prize', $new_prize);
        $update_price->bindvalue('item_id', $item_id);
        $update_price->execute();

        if($update_price){
            // echo $old_prize;
            // echo $new_prize;
            $_SESSION['success'] = "Price changed successfully!";
            header("Location: ../views/exhibitors.php");
        }else{
            $_SESSION['error'] = "Failed to change price!";
            header("Location: ../views/exhibitors.php");
        }
    }