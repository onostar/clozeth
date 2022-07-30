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
    <title>Clozeth | Store registration</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    
    <main>
            <section class="reg_log">
                
                <div class="login_page" id="reg_form">
                    <h1 class="mobile_reg_logo">
                        <a href="../index.php">
                            <img src="../images/logo.png" alt="logo">
                        </a>
                    </h1>
                    
                    <h2>Sell on Clozeth!</h2>
                    <p>Register your company to start selling on Clozeth</p>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<p class='error'>" . $_SESSION['error']. "</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                    <form action="../controller/reg_exhibitors.php" method="POST" enctype="multipart/form-data" id="exh_register" class="form">
                    <div class="input">
                        <div class="data">
                            <input type="text" name="company_name" id="company_name" placeholder="Company Name" required value="<?php if(isset($_SESSION['company'])){
                                echo $_SESSION['company'];
                                unset($_SESSION['company']);
                            }?>">

                        </div>
                        <div class="data">
                            <input type="text" name="company_address" id="company_address" placeholder="Your company Address" required value="<?php if(isset($_SESSION['address'])){
                                echo $_SESSION['address'];
                                unset($_SESSION['address']);
                            }?>">

                        </div>
                    </div>
                    <div class="input">
                        <div class="data">
                            <input type="tel" name="company_phone" id="company_phone" placeholder="Company's Phone number" required onchange="checkNumber(this.value)" value="<?php if(isset($_SESSION['com_phone'])){
                                echo $_SESSION['com_phone'];
                                unset($_SESSION['com_phone']);
                            }?>">
                        </div>
                        <div class="data">
                            <input type="email" name="company_email" id="company_email" placeholder="Company's Email address" required value="<?php if(isset($_SESSION['email'])){
                                echo $_SESSION['email'];
                                unset($_SESSION['email']);
                            }?>">
                        </div>
                    </div>
                    <div class="input">
                    <div class="data">
                            <input type="text" name="contact_person" id="contact_person" placeholder="Contact person Full Name" required value="<?php if(isset($_SESSION['contact_person'])){
                                echo $_SESSION['contact_person'];
                                unset($_SESSION['contact_person']);
                            }?>">
                        </div>
                        <div class="data">
                            <input type="tel" name="contact_phone" id="contact_phone" placeholder="Contact Whatsapp Number" required value="<?php if(isset($_SESSION['contact_phone'])){
                                echo $_SESSION['contact_phone'];
                                unset($_SESSION['contact_phone']);
                            }?>">
                        </div>
                    </div>
                    <div class="input">
                        <div class="data">
                            <label for="company_logo">Upload Company Logo</label>
                            <input type="file" name="company_logo" id="company_logo" required>
                            <?php
                                if(isset($_SESSION['logoErr'])){
                                    echo "<p style='color:red; text-align:left;'>" . $_SESSION['logoErr']. "</p>";
                                    unset($_SESSION['logoErr']);
                                }
                            ?>
                        </div>
                        <div class="data">
                            <label for="company_password">Create Password</label>
                            <input type="password" name="company_password" id="company_password" required placeholder="*******">
                            <?php
                                if(isset($_SESSION['passwordErr'])){
                                    echo "<p style='color:red; text-align:left;'>" . $_SESSION['passwordErr']. "</p>";
                                    unset($_SESSION['passwordErr']);
                                }
                            ?>
                        </div>
                    </div>
                    
                        <div class="data" id="reg_btn">
                            <button type="submit" name="register_exhibitor" id="register_exhibitor">Register <i class="fas fa-paper-plane"></i></button>
                            
                        </div>
                        
                    
                    
                </form>
                    <div class="signup_option">
                        <p>Already have an account? <a href="../index.php">Login now</a></p>
                    </div>
                    <div id="foot">
                        <p >&copy;<?php echo Date("Y");?> Clozeth. All Rights Reserved.</p>

                    </div>

                </div>
                <div class="adds" id="reg_adds">
                    
                </div>
            </section>
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>