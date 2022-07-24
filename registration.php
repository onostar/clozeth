<?php
    session_start();
    require "controller/server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | Register Account</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>     
<body> 
        
    <main id="reg_body">
        <section class="reg_log">
                
            <div class="login_page" id="reg_form">
                <h1>
                    <a href="index.php">
                        <img src="../images/logo.png" alt="logo">
                    </a>
                </h1>
                
                <h2>Welcome Shopper!</h2>
                <p>Register an Account to start shopping</p>
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
                <form action="controller/register.php" method="POST" id="exh_register" class="form">
                    <div class="input">
                        <div class="data">
                            <input type="text" name="first_name" placeholder="First Name" required value="<?php if(isset($_SESSION['first_name'])){
                                echo $_SESSION['first_name'];
                                unset($_SESSION['first_name']);
                            }?>">

                        </div>
                        <div class="data">
                            <input type="text" name="last_name" placeholder="Last Name" required value="<?php if(isset($_SESSION['last_name'])){
                                echo $_SESSION['last_name'];
                                unset($_SESSION['last_name']);
                            }?>">

                        </div>
                    </div>
                    <div class="input">
                        <div class="data">
                            <input type="email" name="email" placeholder="Email address" required value="<?php if(isset($_SESSION['user_email'])){
                                echo $_SESSION['user_email'];
                                unset($_SESSION['user_email']);
                            }?>">
                        </div>
                        <div class="data">
                            <input type="tel" name="phone_number" placeholder="Phone Number" required onchange="checkNumber(this.value)" value="<?php if(isset($_SESSION['phone_number'])){
                                echo $_SESSION['phone_number'];
                                unset($_SESSION['phone_number']);
                            }?>">
                            <?php
                                if(isset($_SESSION['phoneError'])){
                                    echo "<p style='color:red; text-align:left;'>" . $_SESSION['phoneError']. "</p>";
                                    unset($_SESSION['phoneError']);
                                }
                            ?>
                        </div>
                    </div>
                    <div class="input">
                        <div class="data">
                            <input type="text" name="address" placeholder="Delivery Address" required value="<?php if(isset($_SESSION['address'])){
                                echo $_SESSION['address'];
                                unset($_SESSION['address']);
                            }?>">
                        </div>
                        <div class="data">
                            <input type="password" name="user_password" placeholder="enter password" required>
                            <?php
                                if(isset($_SESSION['passwordError'])){
                                    echo "<p style='color:red; text-align:left;'>" . $_SESSION['passwordError']. "</p>";
                                    unset($_SESSION['passwordError']);
                                }
                            ?>
                        </div>
                    </div>
                    <div class="input">
                        
                        <div class="data">
                            <input type="password" name="confirm_password" placeholder="Confirm password" required>
                            <?php
                                if(isset($_SESSION['confirmPwErr'])){
                                    echo "<p style='color:red; text-align:left;'>" . $_SESSION['confirmPwErr']. "</p>";
                                    unset($_SESSION['confirmPwErr']);
                                }
                            ?>
                        </div>
                        
                    </div>
                        <div class="data" id="reg_btn">
                            <button type="submit" name="submit_reg">Register <i class="fas fa-paper-plane"></i></button>
                            
                        </div>
                
                </form>
                <div class="signup_option">
                    <p>Already have an account? <a href="login_page.php">Login now</a></p>
                </div>
                <div id="foot">
                    <p>&copy;<?php echo Date("Y");?> Clozeth. All Rights Reserved.</p>

                </div>

            </div>
            <div class="adds" id="reg_adds">
                <img src="images/home3.jpg" alt="clozeth login banner">
                
            </div>
        </section>
    </main>
   
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
</body>
</html>