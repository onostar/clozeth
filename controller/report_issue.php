<?php
    session_start();
    require "server.php";
    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";
    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    // $_SESSION['error'] = "";
    // $_SESSION['success'] = "";
    if(isset($_POST['send_report'])){
        
        $full_name = ucwords(validate('full_name'));
        $email = strtolower(validate('email_address'));
        $phone_number = validate('phone_number');
        $reason = validate('reason');
        $company = validate('company');
        $item = validate('item_name');
        $description = validate('description');
       
        
        if(strlen($phone_number) != 11){
            $_SESSION['phoneError'] = "Phone Number must be 11 digits";
            header("Location: ../view/report_product.php");
        }else{
            $statement = $connectdb->prepare("INSERT INTO reports (full_name, phone_number, email_address, reason, company, item_name, description) VALUES (:full_name, :phone_number, :email_address, :reason, :company, :item_name, :description)");

            $statement->bindvalue('full_name', $full_name);
            $statement->bindvalue('email_address', $email);
            $statement->bindvalue('phone_number', $phone_number);
            $statement->bindvalue('reason', $reason);
            $statement->bindvalue('company', $company);
            $statement->bindvalue('item_name', $item);
            $statement->bindvalue('description', $description);
            $statement->execute();
            if($statement){
                function smtpmailer($to, $from, $from_name, $subject, $body)
            {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true; 
        
                $mail->SMTPSecure = 'ssl'; 
                $mail->Host = 'www.ippssolar.com';
                $mail->Port = 465; 
                $mail->Username = 'admi@clozeth.com.ng';
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
                    
                    $_SESSION['reported'] = "";
                    header("Location: ../view/report_product.php");
                    $error = $_SESSION['reported'];
                    /* unlink($ssn_folder);
                    unlink($dlf_folder);
                    unlink($dlb_folder); */
                    header("Location: ../view/forgot_password.php");
                    return $error;
                }
            }
            
            $to   = $email;
            $from = 'admin@clozeth.com.ng';
            $from_name = "Clozeth";
            $name = 'Clozeth customer report';
            $subj = "Clozeth report from $full_name";
            $msg = "<p>COmpany: $company<br>Reason: $reason<br>Product: $item<br>Details: $description</p>";          
            $error=smtpmailer($to, $from, $name ,$subj, $msg);
            }
            
        }
    }

