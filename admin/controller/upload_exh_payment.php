<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_POST['add_booth_pay'])){
        $user_id = htmlspecialchars(stripslashes($_POST['exhibitor_id']));
        $booth = htmlspecialchars(stripslashes($_POST['package_id']));
        $receipt = $_FILES['payment']['name'];
        $receipt_folder = "../exh_receipts/".$receipt;
        $receipt_size = $_FILES['payment']['size'];
        $allowed_ext = array("jpg", "png", "pdf", "jpeg");
        /* get file extension */
        $receipt_ext = explode('.', $receipt);
        $receipt_ext = strtolower(end($receipt_ext));
        if(in_array($receipt_ext, $allowed_ext)){
            if($receipt_size <= 1000000){
                 if(move_uploaded_file($_FILES['payment']['tmp_name'], $receipt_folder)){
                    /* insert into payment first */
                    $insert_receipt = $connectdb->prepare("INSERT INTO store_payments (exhibitor, package, payment_slip) VALUES (:exhibitor, :package, :payment_slip)");
                    $insert_receipt->bindvalue("exhibitor", $user_id);
                    $insert_receipt->bindvalue("package", $booth);
                    $insert_receipt->bindvalue("payment_slip", $receipt);
                    $insert_receipt->execute();
                    if($insert_receipt){
                        /* update status */
                        $update_status = $connectdb->prepare("UPDATE exhibitors set payment_status = 1, plan_package = :plan_package WHERE exhibitor_id = :exhibitor_id");
                        $update_status->bindvalue("plan_package", $booth);
                        $update_status->bindvalue("exhibitor_id", $user_id);
                        $update_status->execute();
                        if($update_status){
                            $_SESSION['success'] = "Payment uploaded successfully";
                            header("Location: ../views/exhibitors.php");
                        }else{
                            $_SESSION['error'] = "failed to upload receipt";
                            header("Location: ../views/exhibitors.php");

                        }
                    }else{
                        $_SESSION['error'] = "failed to insert payment";
                            header("Location: ../views/exhibitors.php");
                    }
                }else{
                    $_SESSION['error'] = "failed to upload receipt";
                    header("Location: ../views/exhibitors.php");
                }
            
            }else{
                $_SESSION['error'] = "Error! File too large";
                header("Location: ../views/exhibitors.php");
            }
        } else{
            $_SESSION['error'] = "Error! Invalid file type";
            header("Location: ../views/exhibitors.php");
        }

    }

?>