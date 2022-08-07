<?php
    include "server.php";
    session_start();

        $email = htmlspecialchars(stripslashes($_POST['user_email']));
        $curPwd = htmlspecialchars(stripslashes($_POST['current_password']));
        $newPwd = htmlspecialchars(stripslashes($_POST['new_password']));
        $rePwd = htmlspecialchars(stripslashes($_POST['retype_password']));
        
        /* check password */
        $check_password = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email AND user_password = :user_password");
        $check_password->bindvalue('email', $email);
        $check_password->bindvalue('user_password', $curPwd);
        $check_password->execute();

        if($check_password->rowCount() > 0){
            if(strlen($newPwd) >= 6){
                if($rePwd === $newPwd){
                    $update_password = $connectdb->prepare("UPDATE shoppers SET user_password = :user_password WHERE email = :email");
                    $update_password->bindvalue('user_password', $newPwd);
                    $update_password->bindvalue('email', $email);
                    $update_password->execute();

                    if($update_password){
                        $_SESSION['success'] = "Password Changed successfully, please login";
                        header("Location:../login_page.php");
                    }else{
                        $_SESSION['error'] = "Failed to change password";
                        header("Location: ../view/reset_password.php");
                    }
                }else{
                    $_SESSION['error'] = "Password does not match";
                        header("Location: ../view/reset_password.php");
                    /* echo "<script>Alert('Passwords doesn't Match');
                    window.open('account.php', '_parent')</script>"; */
                }
            }else{
                $_SESSION['error'] = "Password too short!";
                header("Location: ../view/reset_password.php");
            }
        }else{
            echo "<p class='exist'>Current password is incorrect!</p>";
           /*  echo "<script>Alert('Current password is incorrect!');
                window.open('account.php', '_parent')</script>"; */
        }

 
?>