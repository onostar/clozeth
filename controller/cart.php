<?php
    include "server.php";
    session_start();

    /* function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripcslashes($_POST[$field]));
        }
    } */
    /* $_SESSION['success_box'] = "";
    $_SESSION['error_box'] = ""; */
    // if(isset($_POST['add_to_cart'])){
        $item_name = ucwords(htmlspecialchars(stripslashes($_POST['cart_item_name'])));
        $item_id = htmlspecialchars(stripslashes($_POST['cart_item_id']));
        $quantity = $_POST['quantity'];
        $item_price = ucwords(htmlspecialchars(stripslashes($_POST['cart_item_price']))) * $quantity;
        $item_restaurant = ucwords(htmlspecialchars(stripslashes($_POST['cart_item_restaurant'])));
        $customer_email = ucwords(htmlspecialchars(stripslashes($_POST['customer_email'])));
    if(isset($_SESSION['user'])){
        
        /* check user availability */
        $check_user = $connectdb->prepare("SELECT * FROM cart WHERE item_name = :item_name AND company = :company AND customer_email = :customer_email");
        
        $check_user->bindvalue('item_name', $item_name);
        $check_user->bindvalue('company', $item_restaurant);
        $check_user->bindvalue('customer_email', $customer_email);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['cart_already'] = "";
            header("Location: ../view/item_info.php?item=".$item_id);
            /* echo "<script>alert('".$item_name." already in Cart!');
            window.open('../view/item_info.php?item=".$item_id."', '_parent');</script>"; */
            // header("Location: main.php");
            /* $_SESSION['error_box'] = "$item_name from $item_restaurant already in Cart!";
            header("Location: main.php"); */

        }else{
            $add_cart = $connectdb->prepare("INSERT INTO cart (item_name, quantity, item_price, company, customer_email) VALUES (:item_name, :quantity, :item_price, :company, :customer_email)");
            $add_cart->bindvalue('item_name', $item_name);
            $add_cart->bindvalue('item_price', $item_price);
            $add_cart->bindvalue('company', $item_restaurant);
            $add_cart->bindvalue('customer_email', $customer_email);
            $add_cart->bindvalue('quantity', $quantity);
            $add_cart->execute();

            if($add_cart){
                $_SESSION['cart_added'] = "";
                /* echo "<script>alert('".$item_name. " added to cart!');
                window.open('../view/item_info.php?item=".$item_id."', '_parent');</script>"; */
                // $_SESSION['success'] = "$category added Successfully!";
                header("Location: ../view/item_info.php?item=".$item_id);
            }else{
                echo "<script>alert('Item not added!');
                window.open('../view/item_info.php?item=".$item_id."', '_parent');</script>";
                // $_SESSION['error'] = "$category not added!";
                // header("Location: admin.php");

            }
        }
    }else{
        header("Location: ../login_page.php?item=Please login to continue");
    }
?>