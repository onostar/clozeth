<?php
    include "server.php";
    session_start();
    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";
    
    if(isset($_POST['order'])){
        $customer = htmlspecialchars(stripslashes($_POST['customer']));
        $address = htmlspecialchars(stripslashes($_POST['address']));
        /* $today_date = date("Y-m-d");
        $order_time = date("Y-m-d h:i:s"); */
        $status = 0;
        $ran_number = rand(1, 5000);
        $order_dt = date("Ymdhis");
        $order_num = $ran_number . $order_dt;
        $confirm_order = $connectdb->prepare("INSERT INTO orders (customer_email, item_name, quantity, item_price, company, order_number) SELECT customer_email, item_name, quantity, item_price, company, cart_number FROM cart WHERE customer_email = :customer_email");
        $confirm_order->bindvalue('customer_email', $customer);
        $confirm_order->execute();

        if($confirm_order){
            /* update delivery address */
            $update_address = $connectdb->prepare("UPDATE shoppers SET address = :address WHERE email = :email");
            $update_address->bindvalue("address", $address);
            $update_address->bindvalue("email", $customer);
            $update_address->execute();

            /* insert transaction date and number */
            /* $trans_id = $connectdb->lastInsertId();
            $order_num = $order_num.$trans_id;
            $insert_date = $connectdb->prepare("UPDATE orders SET order_number = :order_number WHERE customer_email = :customer_email AND order_time = CURTIME()");
            // $insert_date->bindvalue('order_date', $today_date);
            $insert_date->bindvalue('order_number', $order_num);
            $insert_date->bindvalue('customer_email', $customer);
            // $insert_date->bindvalue('order_time', $order_time);
            
            
            $insert_date->execute(); */


            /* delete from cart */
            $delete_cart = $connectdb->prepare("DELETE FROM cart WHERE customer_email = :customer_email");
            $delete_cart->bindvalue('customer_email', $customer);
            $delete_cart->execute();

            /* get customer details */
            $get_customer = $connectdb->prepare("SELECT first_name, last_name FROM shoppers WHERE email = :email");
            $get_customer->bindvalue('email', $customer);
            $get_customer->execute();
            $details = $get_customer->fetchAll();
            foreach($details as $detail){
                $customer_name = $detail->first_name . ' ' . $detail->last_name;
            }
            /* get restaurant */
            $get_company = $connectdb->prepare("SELECT exhibitors.exhibitor_id, exhibitors.company_email, exhibitors.company_name, orders.company, orders.customer_email FROM exhibitors, orders WHERE orders.customer_email = :customer_email AND exhibitors.exhibitor_id = orders.company");
            $get_company->bindvalue('customer_email', $customer);
            $get_company->execute();
            $shows = $get_company->fetchAll();
            foreach($shows as $show){
                $company_mail = $show->company_email;
                $company = $show->company_name;
            }

            
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
                $_SESSION['success'] = "You have placed your order. Thank You!";
                $error = $_SESSION['success'];
                header("Location: ../view/shopping_cart.php");
                // header("Location: index.html");
                return $error;
            }
        }
        
        $to   = $company_mail;
        $from = 'admin@ippssolar.com';
        $from_name = "Clozeth";
        $name = 'Clozeth order';
        $subj = 'Clozeth New order from '.$customer_name;
        $msg = "<p>You have a new order from $customer_name </p><br> <a href='clozeth.com/admin'>Click</a> to review and deliver order";
        
        $error=smtpmailer($to, $from, $name ,$subj, $msg);
            
        }else{
            $_SESSION['error'] = "Failed to place order!";
            header("Location: ../view/shopping_cart.php");
        }
    }
?>