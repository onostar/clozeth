<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['delegate'])){

        $user_id = $_GET['delegate'];
        $mark = $connectdb->prepare("UPDATE users SET attendance = 1 WHERE pcn_number = :pcn_number");

        $mark->bindvalue("pcn_number", $user_id);
        $mark->execute();

        if($mark){
            $_SESSION['success'] = "Delegate marked present!";
            header("Location: ../views/attendance.php");
        }else{
            $_SESSION['error'] = "Failed to mark Delegate!";
            header("Location: ../views/attendance.php");
        }
        
        
    }
?>