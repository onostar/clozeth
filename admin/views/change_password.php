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
    <title>Clozeth | seller Reset Password</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
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
                
                <h2>Reset password!</h2>
                <!-- <p>Reset your password</p> -->
                <?php
                    if(isset($_SESSION['success'])){
                        echo "<p class='success'>" . $_SESSION['success']. "</p>";
                        unset($_SESSION['success']);
                    }
                    if(isset($_GET['item'])){
                        echo "<p class='success'>" . $_GET['item']. "</p>";
                        unset($_GET['item']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['error'])){
                        echo "<p class='error'>" . $_SESSION['error']. "</p>";
                        unset($_SESSION['error']);
                    }
                ?>
                <?php
                    if(isset($_GET['email'])){
                        $email = $_GET['email'];
                    
                        $get_details = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email = :company_email");
                        $get_details->bindvalue("company_email", $email);
                        $get_details->execute();
                        $results = $get_details->fetchAll();
                        foreach($results as $result){
                ?>
                <form action="../controller/reset_password.php" method="POST">
                    <div class="data">
                        <!-- <label for="username">Enter email address</label> -->
                        <input type="hidden" name="admin_email" id="admin_email" required value="<?php echo $email?>">
                        <input type="hidden" name="current_password" id="current_password" required value="<?php echo $result->company_password?>">
                        
                    </div>
                    <div class="data">
                        <label for="new_password">Enter new Password</label>
                        <input type="password" name="new_password" id="password" placeholder="*******" required>
                        <div class="show_password">
                            <a href="javascript:void(0)" onclick="togglePassword()"><i class="fas fa-eye"></i> Show password</a>
                        </div>
                    </div>
                    <div class="data">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="retype_password" id="retype_password" placeholder="*******" required>
                        <div class="show_password">
                            <a href="javascript:void(0)" onclick="togglePassword()"><i class="fas fa-eye"></i> Show password</a>
                        </div>
                    </div>
                    <div class="data">
                        <button type="submit" id="change_password" name="change_password">Change Password <i class="fas fa-sign-in-alt"></i></button>

                    </div>
                    
                </form>
                <?php
                    }}
                ?>
                <div class="signup_option">
                    <p>Don't have an account yet? <a href="company_registration.php">Signup now</a></p>
                </div>
                <div id="foot">
                    <p >&copy;<?php echo Date("Y");?> Clozeth. All Rights Reserved.</p>

                </div>

            </div>
            <div class="adds">
                <img src="../../images/online_shop3.jpg" alt="clozeth login banner">
            </div>
        </section>
    </main>
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
</body>
</html>