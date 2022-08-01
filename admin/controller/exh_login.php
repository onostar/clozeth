<?php
    include "connections.php";
    session_start();

   /*  $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    $_SESSION['reg_success'] = ""; */


    if(isset($_POST['submit_login'])){
        $username = ucwords(htmlspecialchars(stripslashes($_POST['exh_username'])));
        $password = htmlspecialchars(stripslashes($_POST['password']));

        $get_user = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email = :company_email AND company_password = :company_password");
        $get_user->bindvalue("company_email", $username);
        $get_user->bindvalue("company_password", $password);
        $get_user->execute();
        $_SESSION['email'] = $username;
        if($get_user->rowCount() > 0){
            $_SESSION['user'] = $username;
            if($username == "Admin@clozeth.com"){
                header("Location: ../views/admin.php");
                $_SESSION['reg_success'] = "Welcome Admin!";

            }else{
                $check_expiration = $connectdb->prepare("SELECT expiration FROM exhibitors WHERE company_email = :company_email");
                $check_expiration->bindvalue("company_email", $username);
                $check_expiration->execute();
                $expire_date = $check_expiration->fetch();
                $expiration = $expire_date->expiration;
                $expirations = date("Y-m-d", strtotime($expiration));
                $today = date("Y-m-d");
                if($expirations <= $today){
                $update_status = $connectdb->prepare("UPDATE exhibitors SET payment_status = 0, plan_package = 0 WHERE company_email = :company_email");
                $update_status->bindvalue("company_email", $username);
                $update_status->execute();
                if($update_status){
                    header("Location: ../views/exhibitors.php");
                    $_SESSION['reg_success'] = "Welcome Seller!";
                    $_SESSION['package_status'] = "Your package have expired!. Kindly upgrade your account to continue enjoying the best offers";
                }else{
                    header("Location: ../views/exhibitors.php");
                    $_SESSION['error'] = "Failed to update status!";
                }
                
            }else{
                header("Location: ../views/exhibitors.php");
                $_SESSION['reg_success'] = "Welcome Seller!";
            }
        }
        }else{
            $_SESSION['error'] = "Invalid Username or password";
            header("Location: ../index.php");
        }
         
    }




?>