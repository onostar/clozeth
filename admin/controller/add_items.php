<?php
    include "connections.php";
    session_start();

    if(isset($_POST['addItem'])){
        $item = ucwords(htmlspecialchars(stripslashes($_POST['item_name'])));
        $category = ucwords(htmlspecialchars(stripslashes($_POST['item_category'])));
        $prize = ucwords(htmlspecialchars(stripslashes($_POST['item_prize'])));
        $company = ucwords(htmlspecialchars(stripslashes($_POST['company'])));
        $description = htmlspecialchars(stripslashes($_POST['item_desc']));
        $item_foto = $_FILES['item_foto']['name'];
        $item_folder = "../../items/".$item_foto;
        $item_size = $_FILES['item_foto']['size'];
        $allowed_ext = array("jpeg", "jpg", "png");
        $file_ext = explode('.', $item_foto);
        $file_ext = strtolower(end($file_ext));
        /* set sessions for all fields */
        $_SESSION['category'] = $category;
        $_SESSION['price'] = $prize;
        $_SESSION['item_name'] = $item;
        $_SESSION['item_desc'] = $description;

        /* check extension */
        if(in_array($file_ext, $allowed_ext)){
            if($item_size <= 500000){
                /* check if item exists exsits */
                $check_item = $connectdb->prepare("SELECT * FROM menu WHERE company = :company AND item_name = :item_name");
                $check_item->bindvalue("company", $company);
                $check_item->bindvalue("item_name", $item);
                $check_item->execute();
                if($check_item->rowCount() > 0){
                    $_SESSION['error'] = "$item already exists!";
                    header("Location: ../views/exhibitors.php");
                }else{
                    if(move_uploaded_file($_FILES['item_foto']['tmp_name'], $item_folder)){
                        $add_item = $connectdb->prepare("INSERT INTO menu (item_name, item_category, item_prize, company, item_foto, item_description) VALUES (:item_name, :item_category, :item_prize, :company, :item_foto, :item_description)");
                        $add_item->bindvalue("item_name", $item);
                        $add_item->bindvalue("item_category", $category);
                        $add_item->bindvalue("item_prize", $prize);
                        $add_item->bindvalue("company", $company);
                        $add_item->bindvalue("item_foto", $item_foto);
                        $add_item->bindvalue("item_description", $description);
                        $add_item->execute();
                        if($add_item){
                            $_SESSION['success'] = "'$item' added successfully!";
                            header("Location: ../views/exhibitors.php");
                        }else{
                            $_SESSION['error'] = "Error! File upload failed";
                            header("Location: ../views/exhibitors.php");
                        }
                    }else{
                        $_SESSION['error'] = "Error! File upload failed";
                        header("Location: ../views/exhibitors.php");
                    }
                }
            }else{
                $_SESSION['error'] = "Error! File should not be larger than 500kb";
                header("Location: ../views/exhibitors.php");
            }
        }else{
            $_SESSION['error'] = "Error! Invalid File type";
            header("Location: ../views/exhibitors.php");
        }
    }
?>