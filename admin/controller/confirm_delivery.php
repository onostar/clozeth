<?php
    include "connections.php";
    session_start();
    require "../../PHPMailer/PHPMailerAutoload.php";
    require "../../PHPMailer/class.phpmailer.php";
    require "../../PHPMailer/class.smtp.php";

    if(isset($_GET['dispense'])){
        $item_id = $_GET['dispense'];
        $dispense_item = $connectdb->prepare("UPDATE orders SET order_status = 1, delivery_date = CURDATE() WHERE order_id = :order_id");
        $dispense_item->bindvalue('order_id', $item_id);
        $dispense_item->execute();

        if($dispense_item){
            /* echo "<script>alert('Item dispensed!');
            window.open('admin.php', '_parent');</script>"; */
            //get customer name
            $get_customer = $connectdb->prepare("SELECT * FROM orders WHERE order_id = :order_id");
            $get_customer->bindvalue("order_id", $item_id);
            $get_customer->execute();
            $shows = $get_customer->fetchAll();
            foreach($shows as $show){
            $customer = $show->customer_email;
            $order_id = $show->order_number;
            $item_name = $show->item_name;
            }
            //get customer name
            $get_name = $connectdb->prepare("SELECT first_name FROM shoppers WHERE email = :email");
            $get_name->bindvalue("email", $customer);
            $get_name->execute();
            $name = $get_name->fetch();
            $first_name = $name->first_name;
            //send notification and email to customer
            $subject = "Item Delivered";
            $details = "Hello $first_name, this is to confirm that your order '$item_name', with order number: $order_id has been delivered to your address. \n Thanks for your business. Do Shop more with Us";
            // $mailHeader = "FROM: Admin";
            
            //send notification
            $send_notification = $connectdb->prepare("INSERT INTO notifications (customer_email, subject, details) VALUES(:customer_email, :subject, :details)");
            $send_notification->bindvalue("customer_email", $customer);
            $send_notification->bindvalue("subject", $subject);
            $send_notification->bindvalue("details", $details);
            $send_notification->execute();

            //send mail
            function smtpmailer($to, $from, $from_name, $subject, $body){
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true; 
        
                $mail->SMTPSecure = 'ssl'; 
                $mail->Host = 'www.ippssolar.com';
                $mail->Port = 465; 
                $mail->Username = 'admin@ippssolar.com';
                $mail->Password = 'admin@ippssolar';   
        
        
                $mail->IsHTML(true);
                $mail->From="admin@ippssolar.com";
                $mail->FromName=$from_name;
                $mail->Sender=$from;
                $mail->AddReplyTo($from, $from_name);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);
                $mail->AddAddress('kellyikpefua@gmail.com');
                $mail->AddAddress('onostarmedia@gmail.com');
                
                if(!$mail->Send())
                {
                    $error ="Please try Later, Error Occured while Processing...";
                    return $error; 
                }
                else 
                {
                    
                    /* success message */
                    $_SESSION['success'] = "Item Dispensed!";
                    $error = $_SESSION['success'];
                    header("Location: ../views/exhibitors.php");
                    // header("Location: index.html");
                    return $error;
                }
            }
            
            $to   = $customer;
            $from = 'admin@ippssolar.com';
            $from_name = "Clozeth";
            $name = 'Clozeth order delivery';
            $subj = "$item_name delivered";
            $msg = "<p>Hello $first_name, this is to confirm that your order '$item_name', with order number: $order_id has been delivered to your address. \n Thanks for your business. Do Shop more with Us</p>";
            
            $error=smtpmailer($to, $from, $name ,$subj, $msg);
        }else{
            $_SESSION['error'] = "failed to dispense";
            header("Location: ../views/admin.php");
        }
    }