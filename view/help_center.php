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
        <section id="help_center">
            <div class="help_logo">
                <i class="fas fa-headset"></i>
                <h3>HELP<span>Center</span></h3>
            </div>
            <h2>Clozeth customer care</h2>
            <p class="help_p">How can we be of help?</p>
            <input type="search" placeholder="Describe your issues">

            <div class="help_popular">
                <div class="help_pop">
                    <a href="help.php" title="How to place orders">
                        <i class="fas fa-cart-plus"></i>
                        <p>Place order</p>
                    </a>
                </div>
                <div class="help_pop">
                    <a href="help.php#trackOrder" class="help_link" data-page="trackOrder" title="How to track orders">
                        <i class="fas fa-truck-moving"></i>
                        <p>Track order</p>
                    </a>
                </div>
                <div class="help_pop">
                    <a href="order_cancellation.php" title="Policies for order cancellation">
                        <i class="fas fa-luggage-cart"></i>
                        <p>Order cancellation</p>
                    </a>
                </div>
                <div class="help_pop">
                    <a href="help.php" title="Refund policies">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p>Refunds & Returns</p>
                    </a>
                </div>
                <div class="help_pop">
                    <a href="help.php" title="How to make payment">
                        <i class="fas fa-credit-card"></i>
                        <p>Payments</p>
                    </a>
                </div>
            </div>
        </section>
        
    </main>
    <?php include "footer.php"?>
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>
