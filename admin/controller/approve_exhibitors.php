<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['exhibitor'])){

        $pay_id = $_GET['exhibitor'];
        /* Update payment status */
        $update = $connectdb->prepare("UPDATE store_payments SET payment_status = 1 WHERE payment_id = :payment_id");
        $update->bindvalue("payment_id", $pay_id);
        $update->execute();
        
        if(!$update){
            $_SESSION['error'] = "Payment status failed to update!";
            header("Location: ../views/admin.php");

        }else{
            $get_exh = $connectdb->prepare('SELECT exhibitor FROM store_payments WHERE payment_id = :payment_id');
            $get_exh->bindvalue("payment_id", $pay_id);
            $get_exh->execute();
            if($get_exh){
                $exhibitor = $get_exh->fetch();
                $update_payment = $connectdb->prepare("UPDATE exhibitors SET payment_status = 2 WHERE exhibitor_id = :exhibitor_id");

                $update_payment->bindvalue("exhibitor_id", $exhibitor->exhibitor);
                $update_payment->execute();

                if($update_payment){
                    /* set plan expiration */
                    /* get payment date */
                    $get_date = $connectdb->prepare("SELECT * FROM store_payments WHERE payment_id = :payment_id");
                    $get_date->bindvalue("payment_id", $pay_id);
                    $get_date->execute();
                    $booths = $get_date->fetchAll();
                    foreach($booths as $booth){
                        $package = $booth->package;
                        $pay_date = $booth->payment_date;
                    }
                    /* get package duration */
                    $get_duration = $connectdb->prepare("SELECT duration FROM plan_package WHERE package_id = :package_id");
                    $get_duration->bindvalue("package_id", $package);
                    $get_duration->execute();
                    $durations = $get_duration->fetch();
                    $duration = $durations->duration;
                    /* add package duration to payment date*/
                    $expiration = date("Y-m-d", strtotime($pay_date . ' + '.$duration.' days'));
                    /* now update expiration date of exhibitor package */
                    $update_expiration = $connectdb->prepare("UPDATE exhibitors SET expiration = :expiration WHERE exhibitor_id = :exhibitor_id");
                    $update_expiration->bindvalue("expiration", $expiration);
                    $update_expiration->bindvalue("exhibitor_id", $exhibitor->exhibitor);
                    $update_expiration->execute();
                    $_SESSION['success'] = "Exhibitor payment confirmed!";
                    header("Location: ../views/admin.php");
                }else{
                    $_SESSION['error'] = "Failed to confirm payment!";
                    header("Location: ../views/admin.php");
                }
            }else{
                $_SESSION['error'] = "Failed to get exhibitor details!";
                header("Location: ../views/admin.php");
            }
        }
        
    }
?>