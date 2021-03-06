<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    // $_SESSION['reg_success'] = "";

    if(isset($_POST['register_exhibitor'])){
        $name = ucwords(htmlspecialchars(stripslashes($_POST['company_name'])));
        $address = ucwords(htmlspecialchars(stripslashes($_POST['company_address'])));
        $com_phone = ucwords(htmlspecialchars(stripslashes($_POST['company_phone'])));
        $contact_person = ucwords(htmlspecialchars(stripslashes($_POST['contact_person'])));
        $contact_phone = ucwords(htmlspecialchars(stripslashes($_POST['contact_phone'])));
        $email = ucwords(htmlspecialchars(stripslashes($_POST['company_email'])));
        $password = htmlspecialchars(stripslashes($_POST['company_password']));
        $logo = $_FILES['company_logo']['name'];
        $logo_folder = "../logos/".$logo;
        $logo_size = $_FILES['company_logo']['size'];
        $description = "This is an online store, you can purchase as much as you want";
        $allowed_ext = array('png', 'jpg', 'jpeg');
        /* get current file extention */
        $file_ext = explode('.', $logo);
        $file_ext = strtolower(end($file_ext));
        /* merge company name together so we can add to registration number */
        
        // $cur_time = Date("Y");
        $reg_number = "exh/".substr(trim($name, " "), 0, 7);

        /* create sessions for all parameters so user dont enter data again shuld incase script failed */
        $_SESSION['company'] = $name;
        $_SESSION['address'] = $address;
        $_SESSION['com_phone'] = $com_phone;
        $_SESSION['contact_person'] = $contact_person;
        $_SESSION['contact_phone'] = $contact_phone;
        $_SESSION['email'] = $email;
        if(strlen($password) < 6){
            $_SESSION['passwordErr'] = "Password is too short!";
            header("Location: ../views/company_registration.php");
        }else{
            /* check if user already exists */
            $check_user = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email = :company_email OR company_phone = :company_phone");
            $check_user->bindvalue("company_email", $email);
            $check_user->bindvalue("company_phone", $com_phone);
            $check_user->execute();

            if($check_user->rowCount() > 0){
                $_SESSION['error'] = "User already exists!";
                header("Location: ../views/company_registration.php");
            }else{
                if(in_array($file_ext, $allowed_ext)){
                    if($logo_size <= 500000){
                        if(move_uploaded_file($_FILES['company_logo']['tmp_name'], $logo_folder)){
                            $insert_user = $connectdb->prepare("INSERT INTO exhibitors (company_name, company_address, company_phone, contact_person, contact_phone, company_email, company_password, company_logo, reg_number) VALUES (:company_name, :company_address, :company_phone, :contact_person, :contact_phone, :company_email, :company_password, :company_logo, :reg_number)");
                            $insert_user->bindvalue("company_name", $name);
                            $insert_user->bindvalue("company_address", $address);
                            $insert_user->bindvalue("company_phone", $com_phone);
                            $insert_user->bindvalue("contact_person", $contact_person);
                            $insert_user->bindvalue("company_password", $password);
                            $insert_user->bindvalue("company_email", $email);
                            $insert_user->bindvalue("contact_phone", $contact_phone);
                            $insert_user->bindvalue("company_logo", $logo);
                            // $insert_user->bindvalue("booth", $booth);
                            $insert_user->bindvalue("reg_number", $reg_number);
                            $insert_user->execute();
                            // echo $reg_number;
                            if($insert_user){
                                $_SESSION['user'] = $email;
                                // $get_id = PDO::lastInsertId();
                                $mem_id = $connectdb->lastInsertId();
                                $new_reg = $reg_number.$mem_id;
                                /* get reg date to create plan expiration date */
                                $get_reg = $connectdb->prepare("SELECT reg_date FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                $get_reg->bindvalue("exhibitor_id", $mem_id);
                                $get_reg->execute();
                                $reg_date = $get_reg->fetch();
                                $expiration = date("Y-m-d", strtotime($reg_date->reg_date . ' + 30 days'));
                                /* update reg_num, expiration, package and payment status*/
                                $update_reg = $connectdb->prepare("UPDATE exhibitors SET reg_number = :reg_number, payment_status = 2, banner1 = 'banner1.jpg', banner2 = 'banner2.jpg', banner3 = 'banner3.jpg', banner_description = :banner_description, plan_package = 16, expiration = :expiration WHERE company_email = :company_email");
                                $update_reg->bindvalue("reg_number", $new_reg);
                                $update_reg->bindvalue("expiration", $expiration);
                                $update_reg->bindvalue("company_email", $email);
                                $update_reg->bindvalue("banner_description", $description);
                                $update_reg->execute();
                                /* update payment status */
                                
                                $_SESSION['reg_success'] = "Woo Hoo!!!. Your registration was successful, Set up your store by updating your store banners and start adding items to sell on Clozeth!";
                                header("Location: ../views/exhibitors.php");
                                
                            }else{
                                $_SESSION['error'] = "failed to register";
                                header("Location: ../views/company_registration.php");
        
                            }
                        }else{
                            $_SESSION['failed'] = "logo upload failed";
                            header("Location: ../views/company_registration.php");
        
                        }
                    }else{
                        $_SESSION['logoErr'] = "Error! FIle too large";
                        header("Location: ../views/company_registration.php");
                    }
                }else{
                    $_SESSION['logoErr'] = "Error! File type not supported";
                    header("Location: ../views/company_registration.php");

                }
                
            }    
        }
        
    }
?>