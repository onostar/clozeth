<?php
    include "../controller/connections.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | Verify Account</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <main>
        <section class="reg_log">
            
            <div class="login_page">
                <h1>
                    <a href="../index.php">
                        <img src="../images/logo.png" alt="logo">
                    </a>
                </h1>
                
                <h2>Verify your account</h2>
                <p>Kindly Enter the code sent to your mail to complete your registration</p>
                <?php
                    if(isset($_SESSION['success'])){
                        echo "<p class='success'>" . $_SESSION['success']. "</p>";
                        unset($_SESSION['success']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['error'])){
                        echo "<p class='error'>" . $_SESSION['error']. "</p>";
                        unset($_SESSION['error']);
                    }
                ?>
                <form action="../controller/verify_seller.php" method="POST">
                    <div class="data">
                        <label for="username">Enter verification code</label>
                        <input type="text" name="verify_code" id="verify_code" value="<?php
                            if(isset($_GET['code'])){
                                echo $_GET['code'];
                            }
                        ?>"required>
                    </div>
                    <div class="data">
                        <button type="submit" id="verify" name="verify">Verify <i class="fas fa-sign-in-alt"></i></button>

                    </div>
                    
                </form>
                <div class="signup_option">
                    <p>Don't have an account yet? <a href="company_registration.php">Signup now</a></p>
                </div>
                <div id="foot">
                    <p >&copy;<?php echo Date("Y");?> Clozeth. All Rights Reserved.</p>

                </div>

            </div>
            <div class="adds">
                <img src="../../images/online_shop2.jpg" alt="clozeth login banner">

            </div>
        </section>
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>