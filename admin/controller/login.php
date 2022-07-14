<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    $_SESSION['reg_success'] = "";


    if(isset($_POST['login'])){
        $username = ucwords(htmlspecialchars(stripslashes($_POST['username'])));
        $pcn = htmlspecialchars(stripslashes($_POST['password']));

        $get_user = $connectdb->prepare("SELECT * FROM users WHERE last_name = :last_name AND pcn_number = :pcn_number");
        $get_user->bindvalue("last_name", $username);
        $get_user->bindvalue("pcn_number", $pcn);
        $get_user->execute();

        if($get_user->rowCount() > 0){
            $_SESSION['user'] = $pcn;
            if($username === "Admin"){
                header("Location: ../views/admin.php");
            }elseif($username === "User" && $pcn === "004256"){
                header("Location: ../views/user_attendance.php");
            }else{
                header("Location: ../views/user.php");
            }
        }else{
            /* check payment table */
            $get_payment = $connectdb->prepare("SELECT * FROM paid_members WHERE pcn_number = :pcn_number AND last_name = :last_name");
            $get_payment->bindvalue("pcn_number", $pcn);
            $get_payment->bindvalue("last_name", $username);
            $get_payment->execute();
            if($get_payment->rowCount() > 0){
                /* copy details into users table */
                $insert_user = $connectdb->prepare("INSERT INTO users (last_name, first_name, pcn_number, whatsapp, res_state, user_email, gender) SELECT last_name, first_name, pcn_number, whatsapp, res_state, user_email, gender FROM paid_members WHERE pcn_number = :pcn_number");
                $insert_user->bindvalue("pcn_number", $pcn);
                $insert_user->execute();
                if($insert_user){
                    $_SESSION['user'] = $pcn;
                    /* update new user reg_number */
                    /* get new user id */
                    $id = $connectdb->lastInsertId();
                    /* get new user detail */
                    $get_state = $connectdb->prepare("SELECT res_state FROM users WHERE user_id = :user_id");
                    $get_state->bindvalue("user_id", $id);
                    $get_state->execute();
                    $view = $get_state->fetch();
                    $state = $view->res_state;
                    /* get state_id */
                    
                    /* set reg number */
                    $code = strtoupper(substr($state, 0, 3));
                    $cur_time = Date("Y");
                    $reg_number = $code."/".$cur_time ."/00";
                    $new_reg = $reg_number.$id;
                    $update_reg = $connectdb->prepare("UPDATE users SET reg_number = :reg_number WHERE pcn_number = :pcn_number");
                    $update_reg->bindvalue("reg_number", $new_reg);
                    $update_reg->bindvalue("pcn_number", $pcn);
                    $update_reg->execute();
                    /* update payment_status */
                    $update_payment = $connectdb->prepare("UPDATE users SET payment_status = 2 WHERE pcn_number = :pcn_number");
                    $update_payment->bindvalue("pcn_number", $pcn);
                    $update_payment->execute();
                    $_SESSION['reg_success'] = "Your Login is successful, Your username is your surname! \r\n While Your password is your PCN number! \r\n ";
                    $_SESSION['upload'] = "Kindly confirm your details below and upload your passport";
                    /* header("Location: ../views/user.php"); */
                    header("Location: ../views/welcome_page.php");
                }else{
                    $_SESSION['error'] = "Insert failed!";
                    header("Location: ../views/registration.php");
                }
            }else{
                /* just insert into users table */
                $insert_new = $connectdb->prepare("INSERT INTO users (last_name, pcn_number) VALUES (:last_name, :pcn_number)");
                $insert_new->bindvalue("last_name", $username);
                $insert_new->bindvalue("pcn_number", $pcn);
                $insert_new->execute();
                if($insert_new){
                    $_SESSION['user'] = $pcn;
                    $_SESSION['reg_success'] = "Your Login is successful, Your username is your surname! \r\n While Your password is your PCN number";
                    $_SESSION['error'] = "Capitation for 2022 has not been captured, Kindly update your profile and upload your payment details .";
                    /* $_SESSION['success'] = "Kindly Update your profile"; */
                    header("Location: ../views/welcome_page.php");
                }else{
                    $_SESSION['error'] = "Login failed";
                    header("Location: ../views/registration.php");
                }
            }
        }

    }




?>