<?php 
    include "../controller/server.php";
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | User type</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/logo.png" size="32X32">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>     
<body> 
        
    <main id="reg_body">
        <section class="reg_log">
            
            <div class="login_page">
                <h1>
                    <a href="../index.php">
                        <img src="../images/logo.png" alt="logo">
                    </a>
                </h1>
                
                <h2>Choose user type!</h2>
                <p>I want to</p>
                <div class="user_type">
                    <a title="i want to shop for item" href="../login_page.php">
                        <img src="../images/shopper.webp" alt="buyer">
                        <p>Shop for items <i class="fas fa-shopping-bag"></i></p>
                    </a>
                    <a href="../admin/index.php">
                        <img src="../images/seller.jpg" alt="seller">
                        <p>Sell my products <i class="fas fa-store-alt"></i></p>
                    </a>
                </div>
                <div id="foot">
                    <p >&copy;<?php echo Date("Y");?> Clozeth. All Rights Reserved.</p>

                </div>

            </div>
            <div class="adds">
                <img src="../images/online_shop3.jpg" alt="clozeth login banner">
            </div>
        </section>
    </main>
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
</body>
</html>