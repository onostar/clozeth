<?php
    include "server.php";
    session_start();
    require "../../PHPMailer/PHPMailerAutoload.php";
    require "../../PHPMailer/class.phpmailer.php";
    require "../../PHPMailer/class.smtp.php";

    if(isset($_POST['recover'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        
        /* check database if emai exist */
        $check_email = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email = :company_email");
        $check_email->bindValue('company_email', $email);
        $check_email->execute();

        if(!$check_email->rowCount() > 0){
            $_SESSION['error'] = "This email doesn't exist in our servers!";
            header("Location: ../forgot_password.php");
            
        }else{
            function smtpmailer($to, $from, $from_name, $subject, $body)
            {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true; 
        
                $mail->SMTPSecure = 'ssl'; 
                $mail->Host = 'www.ippssolar.com';
                $mail->Port = 465; 
                $mail->Username = 'admin@clozeth.com.ng';
                $mail->Password = 'yMcmb@her0123!';   
        
        
                $mail->IsHTML(true);
                $mail->From="admin@clozeth.com.ng";
                $mail->FromName=$from_name;
                $mail->Sender=$from;
                $mail->AddReplyTo($from, $from_name);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);
                $mail->AddAddress('onostarkels@gmail.com');
                $mail->AddAddress('clozethinc@gmail.com');
                if(!$mail->Send())
                {
                    $error ="Please try Later, Error Occured while Processing...";
                    return $error; 
                }
                else 
                {
                    
                    $_SESSION['success'] = "Password recovery link sent to email";
                    /* unlink($ssn_folder);
                    unlink($dlf_folder);
                    unlink($dlb_folder); */
                    header("Location: ../views/forgot_password.php");
                    // return $error;
                }
            }
            
            $to   = $email;
            $from = 'admin@clozeth.com.ng';
            $from_name = "Clozeth";
            $name = 'Clozeth Password recovery';
            $subj = 'Clozeth Password recovery';
            $msg = "<p>KIndly click on the link Below to reset your password!</p><br>
            <a style='padding:20px; background:green; color:white;' href='clozeth.com.ng/admin/views/change_password.php?email=$email'>Reset Password</a>";          
            $error=smtpmailer($to, $from, $name ,$subj, $msg);
        }
    }
?>