<?php
    include "connections.php";
    session_start();

    if(isset($_POST['addItem'])){
        $item = ucwords(htmlspecialchars(stripslashes($_POST['item_name'])));
        $category = ucwords(htmlspecialchars(stripslashes($_POST['item_category'])));
        $prize = ucwords(htmlspecialchars(stripslashes($_POST['item_prize'])));
        $company = ucwords(htmlspecialchars(stripslashes($_POST['company'])));
        $description = htmlspecialchars(stripslashes($_POST['item_desc']));
        $delivery = htmlspecialchars(stripslashes($_POST['delivery_time']));
        $payment = htmlspecialchars(stripslashes($_POST['payment_option']));
        /* item main image */
        $item_foto = $_FILES['item_foto']['name'];
        $item_folder = "../../items/".$item_foto;
        $item_size = $_FILES['item_foto']['size'];
        $allowed_ext = array("jpeg", "jpg", "png", "webp");
        $file_ext = explode('.', $item_foto);
        $file_ext = strtolower(end($file_ext));
        /* item second image */
        $other_foto = $_FILES['other_foto']['name'];
        $other_folder = "../../items/".$other_foto;
        $other_size = $_FILES['other_foto']['size'];
        $other_ext = explode('.', $other_foto);
        $other_ext = strtolower(end($other_ext));
        /* set sessions for all fields */
        $_SESSION['category'] = $category;
        $_SESSION['price'] = $prize;
        $_SESSION['item_name'] = $item;
        $_SESSION['item_desc'] = $description;

        /* check extension */
        if(in_array($file_ext, $allowed_ext)){
            if($item_size <= 200000 && $other_size <= 200000){
                /* check if item exists exsits */
                $check_item = $connectdb->prepare("SELECT * FROM menu WHERE company = :company AND item_name = :item_name");
                $check_item->bindvalue("company", $company);
                $check_item->bindvalue("item_name", $item);
                $check_item->execute();
                if($check_item->rowCount() > 0){
                    $_SESSION['error'] = "$item already exists!";
                    header("Location: ../views/exhibitors.php");
                }else{
                    if(move_uploaded_file($_FILES['item_foto']['tmp_name'], $item_folder) && move_uploaded_file($_FILES['other_foto']['tmp_name'], $other_folder)){
                        $add_item = $connectdb->prepare("INSERT INTO menu (item_name, item_category, item_prize, company, item_foto, other_foto, item_description, payment_option, delivery_time) VALUES (:item_name, :item_category, :item_prize, :company, :item_foto, :other_foto, :item_description, :payment_option, :delivery_time)");
                        $add_item->bindvalue("item_name", $item);
                        $add_item->bindvalue("item_category", $category);
                        $add_item->bindvalue("item_prize", $prize);
                        $add_item->bindvalue("company", $company);
                        $add_item->bindvalue("item_foto", $item_foto);
                        $add_item->bindvalue("other_foto", $other_foto);
                        $add_item->bindvalue("item_description", $description);
                        $add_item->bindvalue("payment_option", $payment);
                        $add_item->bindvalue("delivery_time", $delivery);
                        $add_item->execute();
                        if($add_item){
                            $_SESSION['success'] = "'$item' added successfully!";
                            header("Location: ../views/exhibitors.php");
                        }else{
                            $_SESSION['error'] = "Error! File upload just failed";
                            header("Location: ../views/exhibitors.php");
                        }
                    }else{
                        $_SESSION['error'] = "Error! Please upload 2 images of the item";
                        header("Location: ../views/exhibitors.php");
                    }
                }
            }else{
                $_SESSION['error'] = "Error! File should not be larger than 200kb";
                header("Location: ../views/exhibitors.php");
            }
        }else{
            $_SESSION['error'] = "Error! Invalid File type";
            header("Location: ../views/exhibitors.php");
        }
    }
?>