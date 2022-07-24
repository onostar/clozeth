<?php
    require "../controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>
        <?php
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
                $user_info->bindvalue('email', $user);
                $user_info->execute();
                $view = $user_info->fetch();
                echo $view->first_name . " " . $view->last_name. " - Help center";
            }else{
                echo "Clozeth | Help center";
            }
         ?>

    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/logo.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main>
        <section id="helpNotes">
            <figure class="help_banner">
                <div class="help_img">
                    <img src="../images/shop_owner.webp" alt="order & track banner">
                </div>
                <figcaption>
                    <h2>How to Place & track orders</h2>
                    <i class="fas fa-truck-moving"></i>
                    <!-- <img src="../images/tracking_order.png" alt="orders"> -->
                <figcaption>
            </figure>
            <div class="all_helps">
                <div class="help_links">
                    <p class="help_link active_help" data-page="placeOrder">Place order</p>
                    <p class="help_link" data-page="trackOrder">Track order</p>
                    <p class="help_link" data-page="DeliveryTimeline">Delivery time line</p>
                    <p class="help_link" data-page="FAQ">Frequently asked questions</p>
                </div>
                <div class="help_details" id="placeOrder">
                    <div class="place_order_tips">
                        <div class="tips_img">
                            <img src="../images/shop_owner.jpg" alt="order tips">
                        </div>
                        <div class="order_tips">
                            <p><strong>To place an order, kindly follow the steps below:</strong></p>
                            <ol>
                                <li>search for an item you want</li>
                                <li>Click on view item to view details or click on the add to cart icon</li>
                                <li>Proceed to your cart by clicking on the cart icon top right of your screen</li>
                                <li>Complete ordedr by clicking on confirm order</li>
                                <li>Wait to recieve a call from seller to complete transaction</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="help_details" id="trackOrder">
                    <div class="place_order_tips">
                        <div class="tips_img">
                            <img src="../images/home.jpg" alt="order tips">
                        </div>
                        <div class="order_tips">
                            <p>To track your orders kindly follow the steps below</p>
                            <ol>
                                <li>From your account, click on <strong>my orders</strong></li>
                                <li>Click on show details on the order you wish to track</li>
                                <li>Click on track item button to see the delivery details of your order</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="help_details" id="DeliveryTimeline">
                    <p>Delivery timelines varies with different sellers. Your order delivery is dependent on immediate availability of product by the seller.</p>
                    <p>Always contact the seller on the delivery timieline of your order by messaging them via whatsapp or visit their stores on clozeth.</p>
                </div>
                <div class="help_details" id="FAQ">
                    <h3>How can we be of help?</h3>
                    <div id="helpCenter">
                        <ul>
                            <li>
                                <h4 data-page="how_add_items" class="faqs"> How do i add items to my store <i class="fas fa-chevron-down"></i></h4>
                                <p id="how_add_items" class="faq_notes">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic aliquam ipsum laudantium culpa sunt dolore porro aliquid odio excepturi? Beatae eligendi vel voluptate cum nostrum dicta fuga nisi placeat?</p>
                            </li>
                            <li>
                                <h4 data-page="how_change_price" class="faqs">How to change price of an item <i class="fas fa-chevron-down"></i></h4>
                                <p id="how_change_price" class="faq_notes">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic aliquam ipsum laudantium culpa sunt dolore porro aliquid odio excepturi? Beatae eligendi vel voluptate cum nostrum dicta fuga nisi placeat?</p>
                            </li>
                            <li>
                                <h4 data-page="how_deactivate" class="faqs">Deactivate an item <i class="fas fa-chevron-down"></i></h4>
                                <p id="how_deactivate" class="faq_notes">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic aliquam ipsum laudantium culpa sunt dolore porro aliquid odio excepturi? Beatae eligendi vel voluptate cum nostrum dicta fuga nisi placeat?</p>
                            </li>
                            <li>
                                <h4 data-page="how_incoming_orders" class="faqs">Manage incoming orders <i class="fas fa-chevron-down"></i></h4>
                                <p id="how_incoming_orders" class="faq_notes">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic aliquam ipsum laudantium culpa sunt dolore porro aliquid odio excepturi? Beatae eligendi vel voluptate cum nostrum dicta fuga nisi placeat?</p>
                            </li>
                            <li>
                                <h4 data-page="how_deliveries" class="faqs">Manage Deliveries <i class="fas fa-chevron-down"></i></h4>
                                <p id="how_deliveries" class="faq_notes">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic aliquam ipsum laudantium culpa sunt dolore porro aliquid odio excepturi? Beatae eligendi vel voluptate cum nostrum dicta fuga nisi placeat?</p>
                            </li>
                            <li>
                                <h4 data-page="how_cancel_order" class="faqs">How to cancel an order <i class="fas fa-chevron-down"></i></h4>
                                <p id="how_cancel_order" class="faq_notes">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic aliquam ipsum laudantium culpa sunt dolore porro aliquid odio excepturi? Beatae eligendi vel voluptate cum nostrum dicta fuga nisi placeat?</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    <?php include "footer.php"?>
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>
