<?php
    session_start();
    require "server.php";

    if(isset($_POST['submit_message'])){
        $name = ucwords(htmlspecialchars(stripslashes($_POST['contact_name'])));
        $email = htmlspecialchars(stripslashes($_POST['contact_email']));
        $message = htmlspecialchars(stripslashes($_POST['contact_message']));
        
        $send_message = $connectdb->prepare("INSERT INTO messages (contact_name, contact_email, contact_message) VALUES (:contact_name, :contact_email, :contact_message)");
        $send_message->bindvalue('contact_name', $name);
        $send_message->bindvalue('contact_email', $email); 
        $send_message->bindvalue('contact_message', $message);
        $send_message->execute();
        if($send_message){
            /* send mail to admin */
            $subject = "Foodies - New Contact message";
            $content = "You have a new message contact message from $name";
            $mailHeader = "From: $email";
            mail("admin@foodies.com, contact@foodies.com, onostarmedia@gmail.com", $subject, $content, $mailHeader) or die("Error!");

            echo "<script>
                alert('Thanks for sending us a message. We will be in touch shortly!');
                window.open('../view/main.php', '_parent');
            </script>";
        }else{
            echo "<script>
                alert('Message Unsuccessful!');
                window.open('../view/main.php', '_parent');
            </script>";
        }
    }else{
        echo "Not sent " . $name;
    }