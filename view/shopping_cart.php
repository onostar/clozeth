<?php
    require "../controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>
        <?php
            $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
            $user_info->bindvalue('email', $user);
            $user_info->execute();
            $view = $user_info->fetch();
            echo $view->first_name . " " . $view->last_name. " - Clozeth - Shopping cart";
        ?>
    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/logo.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>
    
    <?php include "mobile_menu.php";?>

    <main>
    <section id="shoppingCart">
            <h2>My shopping cart</h2>
            <hr>
            <p class="successful">
                <?php
                    if(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </p>
            <div class="shop_cart">
                
                <div class="cart_items">
                    <?php
                        $cart_items = $connectdb->prepare("SELECT menu.item_foto, menu.item_name, menu.company, cart.cart_id, cart.item_name, cart.customer_email, menu.item_prize, cart.item_price, cart.quantity, cart.company FROM menu, cart WHERE menu.item_name = cart.item_name AND menu.company = cart.company AND cart.customer_email = :customer_email");
                        $cart_items->bindvalue('customer_email', $user);
                        $cart_items->execute();

                        if($cart_items->rowCount() > 0){
                            $views = $cart_items->fetchAll();
                            foreach($views as $view):
                        
                        
                    ?>
                    <figure>
                        <img src="<?php echo '../items/'.$view->item_foto?>" alt="item">

                        <figcaption>
                            <p><strong><?php echo $view->item_name?></strong></p>
                            <p><i class="fas fa-shop"></i> <?php
                            $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                            $get_company->bindvalue("exhibitor_id",$view->company);
                            $get_company->execute();
                            $com = $get_company->fetch(); echo $com->company_name;?></p>
                            <p>Qty: <span id="prizing"><?php echo $view->quantity?></span></p>
                            <p>Amount: ₦<span id="totalprice" class="totalprice"><?php echo number_format($view->item_price)?></span></p>
                            <div class="action">
                                <form action="../controller/update_quantity.php" method="POST">
                                    <input type="number" name="quantity" id="quantity" value="<?php echo $view->quantity?>">
                                    <input type="hidden" name="customer_email" value="<?php echo $user?>">
                                    <input type="hidden" name="item" value="<?php echo $view->item_name?>">
                                    <input type="hidden" name="item_prize" value="<?php echo $view->item_prize?>">
                                    <button type="submit" name="update_qty" title="update Quantity" id="update_qty">Update</button>
                                </form>
                                
                                <a onclick="removeCartItem('<?php echo $view->cart_id?>')" href="javascript:void(0);" title="Remove item" id="remove_item"><i class="fas fa-trash"></i></a>
                            </div>
                            
                        </figcapiton>
                    </figure>
                    <?php
                        endforeach;
                    
                        }else{
                            echo "<p class='empty'>Your cart is empty!</p>";
                        }    
                    ?>
                    
                </div>
                <!-- GETTING TOTAL -->
                <div class="total">
                    <?php
                        if($cart_items->rowCount() > 0):
                    ?>
                    <h3>Amount Due</h3>
                    <p class="total_per_item">Total: <span class="itemsTotal" id="itemTotals">₦<span id="itemTotal"> <?php
                        $get_total = $connectdb->prepare("SELECT SUM(item_price) AS total_prize FROM cart WHERE customer_email = :customer_email");
                        $get_total->bindvalue('customer_email', $user);
                        $get_total->execute();
                        $totals = $get_total->fetchAll();
                        foreach($totals as $total){
                    echo number_format($total->total_prize);}?></span></span></p>
                   
                    <p class="total_per_item">Delivery fee: <span><span id="delivery">Negotiable</span></span></p>
                    <p class="total_per_item">Discount: <span> ₦ <span id="discount">0.00</span></span></p>
                    <hr>
                    <p class="total_per_item" style="font-weight:bold;">Grand Total:<span id="item_grand_total">₦<span id="grandTotal"></span></span></p>
                    <hr>
                    <div class="order_or_clear">
                        <form action="../controller/order.php" method="POST" class="order_form">
                            <input type="hidden" name="customer" value="<?php echo $user?>">
                            <div id="del_address">
                                <label>Delivery Address: <i class="fas fa-pen"></i></label>
                                <input type="text" name="address" id="address" value="<?php 
                                    $get_address = $connectdb->prepare("SELECT address FROM shoppers WHERE email = :email");
                                    $get_address->bindvalue("email", $user);
                                    $get_address->execute();
                                    $user_address = $get_address->fetch();
                                    echo $user_address->address;
                                ?>">
                            </div>
                            <button type="submit" name="order" id="order"><i class="fas fa-wallet"></i> Confirm order</button>
                        </form>
                        <form action="../controller/clear_cart.php" method="POST" class="clear_cart_form">
                            <input type="hidden" name="customer_email" value="<?php echo $user;?>">
                            <button type="submit" name="clear_cart" id="clear_cart"><i class="fas fa-trash"></i> Clear Cart</button>
                        </form>
                    </div>
                </div>
                <?php endif;?>
            </div>
            
        </section>
        <!-- <section id="featured">
            
            <h2>Featured cuisines</h2>
            <div class="featured">
                <?php
                    /* $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row): */
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        <figcaption>
                            <p><?php echo $row->item_name?></p>
                            <span>₦ <?php echo $row->item_prize?></span>
                        </figcaption>
                    </a>
                </figure>
                
                <?php //endforeach ?>
            </div>
            <button id="view_more">View more</button>
            <button id="show_less">Show less</button>
        </section>
        <section id="shop" class="row">
            
        </section> -->
        
    </main>
    <footer>
        <?php include "footer.php";?>
    </footer>
    
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
</body>
</html>

<?php
    }else{
        header("Location: ../index.php");
    }
?> 